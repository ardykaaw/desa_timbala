<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Publication;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function berita()
    {
        $news = News::latest()->paginate(10);
        return view('pages.admin.berita', compact('news'));
    }
    
    public function layanan()
    {
        try {
            $services = Service::withCount('serviceRequests')->get();
            $serviceRequests = ServiceRequest::with('service')->latest()->paginate(10);
            
            $stats = [
                'total_services' => Service::count(),
                'active_services' => Service::active()->count(),
                'online_services' => Service::online()->count(),
                'offline_services' => Service::offline()->count(),
                'pending_requests' => ServiceRequest::pending()->count(),
                'processing_requests' => ServiceRequest::processing()->count(),
                'completed_requests' => ServiceRequest::completed()->count(),
                'today_requests' => ServiceRequest::whereDate('created_at', today())->count()
            ];

            return view('pages.admin.layanan-simple', compact('services', 'serviceRequests', 'stats'));
        } catch (\Exception $e) {
            \Log::error('Error in layanan method: ' . $e->getMessage());
            
            // Return empty data on error
            $services = collect();
            $serviceRequests = collect();
            $stats = [
                'total_services' => 0,
                'active_services' => 0,
                'online_services' => 0,
                'offline_services' => 0,
                'pending_requests' => 0,
                'processing_requests' => 0,
                'completed_requests' => 0,
                'today_requests' => 0
            ];

            return view('pages.admin.layanan-simple', compact('services', 'serviceRequests', 'stats'))
                ->with('error', 'Terjadi kesalahan saat memuat data layanan');
        }
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'type' => 'required|in:online,offline',
            'icon' => 'nullable|string',
            'requirements' => 'nullable|string',
            'procedures' => 'nullable|string',
            'processing_days' => 'required|integer|min:1',
            'fee' => 'nullable|numeric|min:0'
        ]);

        Service::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Layanan berhasil ditambahkan!'
        ]);
    }

    public function updateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'type' => 'required|in:online,offline',
            'icon' => 'nullable|string',
            'requirements' => 'nullable|string',
            'procedures' => 'nullable|string',
            'processing_days' => 'required|integer|min:1',
            'fee' => 'nullable|numeric|min:0',
            'is_active' => 'boolean'
        ]);

        $service->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Layanan berhasil diperbarui!'
        ]);
    }

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return response()->json([
            'success' => true,
            'message' => 'Layanan berhasil dihapus!'
        ]);
    }

    public function updateServiceRequestStatus(Request $request, $id)
    {
        $serviceRequest = ServiceRequest::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,processing,completed,rejected',
            'admin_notes' => 'nullable|string'
        ]);

        $data = $request->only(['status', 'admin_notes']);
        
        if ($request->status === 'processing') {
            $data['processed_at'] = now();
        } elseif ($request->status === 'completed') {
            $data['completed_at'] = now();
        }

        $serviceRequest->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Status pengajuan berhasil diperbarui!'
        ]);
    }

    public function getServiceRequest($id)
    {
        $request = ServiceRequest::with('service')->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'request' => $request
        ]);
    }

    public function getService($id)
    {
        $service = Service::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'service' => $service
        ]);
    }

    public function getNews($id)
    {
        $news = News::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'news' => $news
        ]);
    }
    
    public function publikasi()
    {
        $publications = Publication::latest()->paginate(10);
        
        $stats = [
            'total_publications' => Publication::count(),
            'active_publications' => Publication::active()->count(),
            'documents' => Publication::byType('dokumen')->count(),
            'videos' => Publication::byType('video')->count(),
            'audios' => Publication::byType('audio')->count(),
            'images' => Publication::byType('gambar')->count(),
            'total_downloads' => Publication::sum('downloads')
        ];

        return view('pages.admin.publikasi', compact('publications', 'stats'));
    }

    // News CRUD methods
    public function storeNews(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'category' => 'required|string|max:100',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->all();
        
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('news', $imageName, 'public');
            $data['featured_image'] = $imagePath;
        }

        // Set published_at if status is published
        if ($request->status === 'published') {
            $data['published_at'] = now();
        }

        News::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil ditambahkan!'
        ]);
    }

    public function updateNews(Request $request, $id)
    {
        $news = News::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'category' => 'required|string|max:100',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->all();
        
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($news->featured_image) {
                Storage::disk('public')->delete($news->featured_image);
            }
            
            $image = $request->file('featured_image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('news', $imageName, 'public');
            $data['featured_image'] = $imagePath;
        }

        // Set published_at if status is published and not already published
        if ($request->status === 'published' && !$news->published_at) {
            $data['published_at'] = now();
        }

        $news->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil diperbarui!'
        ]);
    }

    public function deleteNews($id)
    {
        $news = News::findOrFail($id);
        
        // Delete featured image
        if ($news->featured_image) {
            Storage::disk('public')->delete($news->featured_image);
        }
        
        $news->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berita berhasil dihapus!'
        ]);
    }

    public function toggleNewsStatus($id)
    {
        $news = News::findOrFail($id);
        
        if ($news->status === 'draft') {
            $news->update([
                'status' => 'published',
                'published_at' => now()
            ]);
            $message = 'Berita berhasil dipublikasikan!';
        } else {
            $news->update([
                'status' => 'draft',
                'published_at' => null
            ]);
            $message = 'Berita berhasil dijadikan draft!';
        }

        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    // Publication CRUD methods
    public function storePublication(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:dokumen,video,audio,gambar',
            'file' => 'required|file|max:10240', // 10MB max
            'category' => 'nullable|string|max:100',
            'author' => 'nullable|string|max:255',
            'published_date' => 'nullable|date'
        ], [
            'title.required' => 'Judul publikasi harus diisi',
            'type.required' => 'Tipe publikasi harus dipilih',
            'file.required' => 'File publikasi harus diupload',
            'file.max' => 'Ukuran file maksimal 10MB'
        ]);

        $data = $request->all();
        
        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('publications', $fileName, 'public');
            
            $data['file_path'] = $filePath;
            $data['file_name'] = $file->getClientOriginalName();
            $data['file_size'] = $file->getSize();
            $data['file_type'] = $file->getMimeType();
        }

        Publication::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Publikasi berhasil ditambahkan!'
        ]);
    }

    public function updatePublication(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:dokumen,video,audio,gambar',
            'file' => 'nullable|file|max:10240',
            'category' => 'nullable|string|max:100',
            'author' => 'nullable|string|max:255',
            'published_date' => 'nullable|date',
            'is_active' => 'boolean'
        ], [
            'title.required' => 'Judul publikasi harus diisi',
            'type.required' => 'Tipe publikasi harus dipilih',
            'file.max' => 'Ukuran file maksimal 10MB'
        ]);

        $data = $request->all();
        
        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file
            if ($publication->file_path) {
                Storage::disk('public')->delete($publication->file_path);
            }
            
            $file = $request->file('file');
            $fileName = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('publications', $fileName, 'public');
            
            $data['file_path'] = $filePath;
            $data['file_name'] = $file->getClientOriginalName();
            $data['file_size'] = $file->getSize();
            $data['file_type'] = $file->getMimeType();
        }

        $publication->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Publikasi berhasil diperbarui!'
        ]);
    }

    public function deletePublication($id)
    {
        $publication = Publication::findOrFail($id);
        
        // Delete file
        if ($publication->file_path) {
            Storage::disk('public')->delete($publication->file_path);
        }
        
        $publication->delete();

        return response()->json([
            'success' => true,
            'message' => 'Publikasi berhasil dihapus!'
        ]);
    }

    public function getPublication($id)
    {
        $publication = Publication::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'publication' => $publication
        ]);
    }

    public function downloadPublication($id)
    {
        $publication = Publication::findOrFail($id);
        
        // Increment download count
        $publication->downloads = $publication->downloads + 1;
        $publication->save();
        
        // Simple redirect to file
        return redirect(asset('storage/' . $publication->file_path));
    }

    public function downloadPage($id)
    {
        $publication = Publication::findOrFail($id);
        
        // Add computed attributes
        $publication->type_icon = $this->getTypeIcon($publication->type);
        $publication->file_size_formatted = $this->formatFileSize($publication->file_size);
        $publication->file_extension = pathinfo($publication->file_name, PATHINFO_EXTENSION);
        
        return view('pages.publication-download', compact('publication'));
    }

    public function editPublication($id)
    {
        $publication = Publication::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'publication' => $publication
        ]);
    }

    public function trackDownload($id)
    {
        $publication = Publication::findOrFail($id);
        
        // Increment download count
        $publication->downloads = $publication->downloads + 1;
        $publication->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Download tracked successfully'
        ]);
    }

    private function getTypeIcon($type)
    {
        $icons = [
            'dokumen' => 'fas fa-file-pdf',
            'video' => 'fas fa-video',
            'audio' => 'fas fa-music',
            'gambar' => 'fas fa-image'
        ];
        
        return $icons[$type] ?? 'fas fa-file';
    }

    private function formatFileSize($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        
        $bytes /= pow(1024, $pow);
        
        return round($bytes, 2) . ' ' . $units[$pow];
    }
}

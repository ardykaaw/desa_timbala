<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Publication;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{
    public function index()
    {
        $news = News::published()->latest()->take(4)->get();
        return view('homepage', compact('news'));
    }

    public function profil()
    {
        return view('sections.profil');
    }

    public function sejarah()
    {
        return view('sections.sejarah');
    }

    public function wisata()
    {
        return view('sections.wisata');
    }

    public function publikasi()
    {
        $publications = Publication::active()->latest()->get();
        return view('sections.publikasi', compact('publications'));
    }

    public function visimisi()
    {
        return view('sections.visimisi');
    }

    public function struktur()
    {
        return view('sections.struktur');
    }

    public function layanan()
    {
        // Clear any cached data to ensure fresh data
        \Cache::forget('services_list');
        
        $services = Service::active()->orderBy('name')->get();
        
        // Log for debugging
        \Log::info('Layanan method called', [
            'services_count' => $services->count(),
            'services' => $services->pluck('name')->toArray()
        ]);
        
        return view('sections.layanan', compact('services'));
    }

    public function submitServiceRequest(Request $request)
    {
        try {
            \Log::info('Service request submitted', [
                'data' => $request->all(),
                'method' => $request->method(),
                'headers' => $request->headers->all(),
                'ajax' => $request->ajax(),
                'wantsJson' => $request->wantsJson(),
                'isJson' => $request->isJson(),
                'contentType' => $request->header('Content-Type'),
                'accept' => $request->header('Accept'),
                'xRequestedWith' => $request->header('X-Requested-With')
            ]);
            
            $request->validate([
                'service_type' => 'required|string',
                'nik' => 'required|string|size:16',
                'full_name' => 'required|string|max:255',
                'birth_place' => 'required|string|max:255',
                'birth_date' => 'required|date',
                'gender' => 'required|in:laki-laki,perempuan',
                'address' => 'required|string',
                'phone' => 'required|string',
                'email' => 'nullable|email',
                'additional_info' => 'nullable|string',
                'attachments' => 'nullable|array',
                'attachments.*' => 'file|mimes:jpg,jpeg,png,pdf|max:2048'
            ]);

            // Find or create service based on service_type
            $service = Service::where('name', 'LIKE', '%' . $request->service_type . '%')->first();
            
            if (!$service) {
                // Create a generic service if not found
                $service = Service::create([
                    'name' => $request->service_type,
                    'description' => 'Layanan ' . $request->service_type,
                    'category' => 'administrasi',
                    'type' => 'offline',
                    'is_active' => true
                ]);
            }

            // Handle file uploads
            $attachments = [];
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $path = $file->store('service-requests', 'public');
                    $attachments[] = $path;
                }
            }

            // Create service request
            $serviceRequest = ServiceRequest::create([
                'service_id' => $service->id,
                'full_name' => $request->full_name,
                'nik' => $request->nik,
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'additional_info' => $request->additional_info,
                'attachments' => $attachments,
                'status' => 'pending'
            ]);

            \Log::info('Service request created successfully', [
                'service_request_id' => $serviceRequest->id,
                'service_name' => $service->name
            ]);

            // Always return JSON response for better debugging
            \Log::info('Returning JSON response', [
                'ajax' => $request->ajax(),
                'wantsJson' => $request->wantsJson(),
                'accept' => $request->header('Accept')
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Pengajuan layanan berhasil dikirim! Nomor pengajuan akan dikirim via SMS/WhatsApp.',
                'data' => [
                    'service_request_id' => $serviceRequest->id,
                    'service_name' => $service->name,
                    'status' => 'pending'
                ]
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error in submitServiceRequest', [
                'errors' => $e->errors(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan validasi data',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Error in submitServiceRequest', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengirim pengajuan. Silakan coba lagi.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function kontak()
    {
        return view('sections.kontak');
    }

    public function newsDetail($slug)
    {
        $news = News::where('slug', $slug)
                    ->where('status', 'published')
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now())
                    ->firstOrFail();

        // Get related news (same category, excluding current news)
        $relatedNews = News::where('category', $news->category)
                          ->where('id', '!=', $news->id)
                          ->where('status', 'published')
                          ->whereNotNull('published_at')
                          ->where('published_at', '<=', now())
                          ->latest()
                          ->take(3)
                          ->get();

        return view('news.detail', compact('news', 'relatedNews'));
    }

    public function incrementViews($id)
    {
        $news = News::findOrFail($id);
        $news->incrementViews();
        
        return response()->json(['success' => true]);
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

    public function getPublication($id)
    {
        $publication = Publication::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'publication' => $publication
        ]);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('pages.admin.berita', compact('news'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'category' => 'required|string|in:pemerintahan,pembangunan,kesejahteraan,umum',
                'excerpt' => 'nullable|string|max:500',
                'content' => 'required|string',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|string|in:draft,published'
            ]);

            $data = $request->only(['title', 'category', 'excerpt', 'content', 'status']);
            $data['author'] = auth()->user()->name ?? 'Admin';
            $data['slug'] = Str::slug($request->title);
            
            if ($request->hasFile('featured_image')) {
                $data['featured_image'] = $request->file('featured_image')->store('news', 'public');
            }

            if ($request->status === 'published') {
                $data['published_at'] = now();
            }

            $news = News::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil disimpan',
                'data' => $news
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $news = News::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'news' => $news
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Berita tidak ditemukan'
            ], 404);
        }
    }

    public function edit($id)
    {
        try {
            $news = News::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'news' => $news
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Berita tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $news = News::findOrFail($id);
            
            $request->validate([
                'title' => 'required|string|max:255',
                'category' => 'required|string|in:pemerintahan,pembangunan,kesejahteraan,umum',
                'excerpt' => 'nullable|string|max:500',
                'content' => 'required|string',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status' => 'required|string|in:draft,published'
            ]);

            $data = $request->only(['title', 'category', 'excerpt', 'content', 'status']);
            $data['slug'] = Str::slug($request->title);
            
            if ($request->hasFile('featured_image')) {
                // Delete old image
                if ($news->featured_image) {
                    Storage::disk('public')->delete($news->featured_image);
                }
                $data['featured_image'] = $request->file('featured_image')->store('news', 'public');
            }

            if ($request->status === 'published' && !$news->published_at) {
                $data['published_at'] = now();
            }

            $news->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil diperbarui',
                'data' => $news
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $news = News::findOrFail($id);
            
            // Delete image if exists
            if ($news->featured_image) {
                Storage::disk('public')->delete($news->featured_image);
            }
            
            $news->delete();

            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function toggleStatus($id)
    {
        try {
            $news = News::findOrFail($id);
            
            if ($news->status === 'published') {
                $news->update(['status' => 'draft']);
                $message = 'Berita berhasil dijadikan draft';
            } else {
                $news->update([
                    'status' => 'published',
                    'published_at' => now()
                ]);
                $message = 'Berita berhasil dipublikasikan';
            }

            return response()->json([
                'success' => true,
                'message' => $message,
                'data' => $news
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}

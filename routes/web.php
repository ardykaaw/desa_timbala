<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\NewsController;


Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Public routes
Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/profil', [WebsiteController::class, 'profil'])->name('profil');
Route::get('/sejarah', [WebsiteController::class, 'sejarah'])->name('sejarah');
Route::get('/wisata', [WebsiteController::class, 'wisata'])->name('wisata');
Route::get('/publikasi', [WebsiteController::class, 'publikasi'])->name('publikasi');
Route::get('/visimisi', [WebsiteController::class, 'visimisi'])->name('visimisi');
Route::get('/struktur', [WebsiteController::class, 'struktur'])->name('struktur');
Route::get('/layanan', [WebsiteController::class, 'layanan'])->name('layanan');
Route::get('/kontak', [WebsiteController::class, 'kontak'])->name('kontak');

// News routes
Route::get('/berita/{slug}', [WebsiteController::class, 'newsDetail'])->name('news.detail');
Route::post('/berita/{id}/increment-views', [WebsiteController::class, 'incrementViews'])->name('news.increment-views');

// Service routes
Route::post('/layanan/submit', [WebsiteController::class, 'submitServiceRequest'])->name('service.submit');

// Publication routes
Route::get('/publikasi/{id}/download', [WebsiteController::class, 'downloadPublication'])->name('publication.download');
Route::get('/publikasi/{id}/detail', [WebsiteController::class, 'getPublication'])->name('publication.detail');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('welcome');
    })->name('admin.dashboard');

    // Admin pages
    Route::get('/admin/berita', [NewsController::class, 'index'])->name('admin.berita');
    Route::get('/admin/layanan', [AdminController::class, 'layanan'])->name('admin.layanan');
    Route::get('/admin/publikasi', [AdminController::class, 'publikasi'])->name('admin.publikasi');

    // News CRUD routes
    Route::post('/admin/news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/admin/news/{id}', [NewsController::class, 'show'])->name('admin.news.show');
    Route::get('/admin/news/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/admin/news/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('admin.news.delete');
    Route::post('/admin/news/{id}/toggle-status', [NewsController::class, 'toggleStatus'])->name('admin.news.toggle-status');
            
        // Service CRUD routes
        Route::post('/admin/services', [AdminController::class, 'storeService'])->name('admin.services.store');
        Route::get('/admin/services/{id}', [AdminController::class, 'getService'])->name('admin.services.show');
        Route::put('/admin/services/{id}', [AdminController::class, 'updateService'])->name('admin.services.update');
        Route::delete('/admin/services/{id}', [AdminController::class, 'deleteService'])->name('admin.services.delete');
        Route::get('/admin/service-requests/{id}', [AdminController::class, 'getServiceRequest'])->name('admin.service-requests.show');
        Route::post('/admin/service-requests/{id}/update-status', [AdminController::class, 'updateServiceRequestStatus'])->name('admin.service-requests.update-status');
        
        // Publication CRUD routes
        Route::post('/admin/publications', [AdminController::class, 'storePublication'])->name('admin.publications.store');
        Route::get('/admin/publications/{id}', [AdminController::class, 'getPublication'])->name('admin.publications.show');
        Route::get('/admin/publications/{id}/edit', [AdminController::class, 'editPublication'])->name('admin.publications.edit');
        Route::put('/admin/publications/{id}', [AdminController::class, 'updatePublication'])->name('admin.publications.update');
        Route::delete('/admin/publications/{id}', [AdminController::class, 'deletePublication'])->name('admin.publications.delete');
        Route::get('/admin/publications/{id}/download', [AdminController::class, 'downloadPublication'])->name('admin.publications.download');
        Route::get('/admin/publications/{id}/download-page', [AdminController::class, 'downloadPage'])->name('admin.publications.download-page');
        Route::post('/admin/publications/{id}/track-download', [AdminController::class, 'trackDownload'])->name('admin.publications.track-download');
    
    // User management
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::put('/user/reset/{id}', [UserController::class, 'reset'])->name('user.reset');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});
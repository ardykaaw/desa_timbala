@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .page-header {
        background: linear-gradient(135deg, #2c5f2d 0%, #97bc62 100%);
        color: white;
        border-radius: 0 0 20px 20px;
        margin-bottom: 2rem;
    }
    .page-pretitle {
        color: rgba(255, 255, 255, 0.8);
    }
    .page-title {
        color: white;
    }
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    }
    .btn-primary {
        background: linear-gradient(135deg, #2c5f2d, #97bc62);
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(44, 95, 45, 0.3);
    }
    .btn-outline-primary {
        border-color: #2c5f2d;
        color: #2c5f2d;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    .btn-outline-primary:hover {
        background: #2c5f2d;
        border-color: #2c5f2d;
        transform: translateY(-2px);
    }
    .table {
        border-radius: 10px;
        overflow: hidden;
    }
    .table thead th {
        background: linear-gradient(135deg, #2c5f2d, #97bc62);
        color: white;
        border: none;
        font-weight: 600;
    }
    .table tbody tr {
        transition: all 0.3s ease;
    }
    .table tbody tr:hover {
        background: rgba(44, 95, 45, 0.05);
    }
    .badge {
        border-radius: 20px;
        padding: 8px 15px;
        font-weight: 500;
    }
    .badge.bg-green {
        background: linear-gradient(135deg, #2c5f2d, #97bc62) !important;
    }
    .badge.bg-yellow {
        background: linear-gradient(135deg, #f9bc60, #f4a261) !important;
    }
    .badge.bg-red {
        background: linear-gradient(135deg, #e76f51, #f4a261) !important;
    }
    .btn-group .btn {
        min-height: 36px;
        min-width: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        font-size: 14px;
        font-weight: 500;
    }
    .btn-group .btn i {
        font-size: 14px;
        color: inherit;
        display: inline-block;
        vertical-align: middle;
    }
    .btn-group .btn span {
        font-size: 12px;
        font-weight: 500;
        display: inline-block;
        vertical-align: middle;
    }
    .btn-group .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }
    .btn-group .btn:active {
        transform: translateY(0);
    }
    .btn-group .btn:focus {
        box-shadow: 0 0 0 0.2rem rgba(44, 95, 45, 0.25);
    }
</style>
@endpush

@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    <i class="fas fa-newspaper me-2"></i>
                    Manajemen Konten
                </div>
                <h2 class="page-title">
                    <img src="{{ asset('images/logo 1.png') }}" alt="Logo Desa Timbala" style="height: 40px; margin-right: 10px;">
                    Berita Desa
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-outline-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-tambah-berita">
                        <i class="fas fa-plus me-2"></i>
                        Tambah Berita
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-tambah-berita">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <!-- Stats Cards -->
        <div class="row row-deck row-cards mb-4">
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Total Berita</div>
                        </div>
                        <div class="h1 mb-3">24</div>
                        <div class="d-flex align-items-center">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                <i class="fas fa-arrow-up me-1"></i>
                                12%
                            </span>
                            <span class="text-muted ms-2">dari bulan lalu</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Berita Aktif</div>
                        </div>
                        <div class="h1 mb-3">18</div>
                        <div class="d-flex align-items-center">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                <i class="fas fa-check-circle me-1"></i>
                                75%
                            </span>
                            <span class="text-muted ms-2">dari total berita</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Draft</div>
                        </div>
                        <div class="h1 mb-3">4</div>
                        <div class="d-flex align-items-center">
                            <span class="text-yellow d-inline-flex align-items-center lh-1">
                                <i class="fas fa-edit me-1"></i>
                                Menunggu
                            </span>
                            <span class="text-muted ms-2">review</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Views Hari Ini</div>
                        </div>
                        <div class="h1 mb-3">1,234</div>
                        <div class="d-flex align-items-center">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                <i class="fas fa-eye me-1"></i>
                                8.2%
                            </span>
                            <span class="text-muted ms-2">dari kemarin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-list me-2"></i>
                            Daftar Berita
                        </h3>
                        <div class="card-actions">
                            <div class="dropdown">
                                <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-download me-2"></i>Export Excel
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-file-pdf me-2"></i>Export PDF
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-settings me-2"></i>Pengaturan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Filter -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Cari berita...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option value="">Semua Status</option>
                                    <option value="published">Diterbitkan</option>
                                    <option value="draft">Draft</option>
                                    <option value="archived">Diarsipkan</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option value="">Semua Kategori</option>
                                    <option value="pemerintahan">Pemerintahan</option>
                                    <option value="pembangunan">Pembangunan</option>
                                    <option value="kesejahteraan">Kesejahteraan</option>
                                    <option value="umum">Umum</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary w-100">
                                    <i class="fas fa-filter me-1"></i>Filter
                                </button>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Judul Berita</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Penulis</th>
                                        <th>Tanggal</th>
                                        <th>Views</th>
                                        <th class="w-1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($news as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    @if($item->featured_image)
                                                        <img src="{{ asset('storage/' . $item->featured_image) }}" class="rounded" alt="{{ $item->title }}" style="width: 60px; height: 40px; object-fit: cover;">
                                                    @else
                                                        <div class="bg-light d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 40px;">
                                                            <i class="fas fa-image text-muted"></i>
                                                </div>
                                                    @endif
                                                </div>
                                                <div class="flex-fill ms-3">
                                                    <div class="font-weight-medium">{{ $item->title }}</div>
                                                    <div class="text-muted">{{ Str::limit($item->excerpt, 50) }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-blue text-light">{{ ucfirst($item->category) }}</span>
                                        </td>
                                        <td>
                                            @if($item->status === 'published')
                                                <span class="badge bg-green text-light">Diterbitkan</span>
                                            @else
                                                <span class="badge bg-yellow text-light">Draft</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->author }}</td>
                                        <td>{{ $item->formatted_published_at ?? 'Belum dipublikasikan' }}</td>
                                        <td>{{ number_format($item->views) }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-outline-primary" data-bs-toggle="tooltip" title="Lihat" onclick="viewNews({{ $item->id }})" style="padding: 8px 12px; min-width: 40px;">
                                                    <i class="fas fa-eye me-1"></i>
                                                    <span class="d-none d-sm-inline">Lihat</span>
                                                </button>
                                                <button class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Edit" onclick="editNews({{ $item->id }})" style="padding: 8px 12px; min-width: 40px;">
                                                    <i class="fas fa-edit me-1"></i>
                                                    <span class="d-none d-sm-inline">Edit</span>
                                                </button>
                                                <button class="btn btn-outline-{{ $item->status === 'published' ? 'secondary' : 'success' }}" data-bs-toggle="tooltip" title="{{ $item->status === 'published' ? 'Jadikan Draft' : 'Publikasikan' }}" onclick="toggleStatus({{ $item->id }})" style="padding: 8px 12px; min-width: 40px;">
                                                    <i class="fas fa-{{ $item->status === 'published' ? 'eye-slash' : 'eye' }} me-1"></i>
                                                    <span class="d-none d-sm-inline">{{ $item->status === 'published' ? 'Draft' : 'Publish' }}</span>
                                                </button>
                                                <button class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Hapus" onclick="deleteNews({{ $item->id }})" style="padding: 8px 12px; min-width: 40px;">
                                                    <i class="fas fa-trash me-1"></i>
                                                    <span class="d-none d-sm-inline">Hapus</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="fas fa-newspaper fa-3x mb-3"></i>
                                                <p>Belum ada berita. <a href="#" data-bs-toggle="modal" data-bs-target="#modal-tambah-berita">Tambah berita pertama</a></p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($news->hasPages())
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="text-muted">
                                Menampilkan {{ $news->firstItem() }} - {{ $news->lastItem() }} dari {{ $news->total() }} berita
                            </div>
                            <div>
                                {{ $news->links() }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Berita -->
<div class="modal modal-blur fade" id="modal-tambah-berita" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>
                    Tambah Berita Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="news-form" method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label">Judul Berita <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan judul berita" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                                <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="pemerintahan" {{ old('category') == 'pemerintahan' ? 'selected' : '' }}>Pemerintahan</option>
                                    <option value="pembangunan" {{ old('category') == 'pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                                    <option value="kesejahteraan" {{ old('category') == 'kesejahteraan' ? 'selected' : '' }}>Kesejahteraan</option>
                                    <option value="umum" {{ old('category') == 'umum' ? 'selected' : '' }}>Umum</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Excerpt (Ringkasan)</label>
                                <textarea name="excerpt" class="form-control @error('excerpt') is-invalid @enderror" rows="3" placeholder="Ringkasan singkat berita (opsional)">{{ old('excerpt') }}</textarea>
                                @error('excerpt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Konten Berita <span class="text-danger">*</span></label>
                                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="8" placeholder="Tulis konten berita di sini..." required>{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Gambar Utama</label>
                                <input type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" accept="image/*">
                                <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                                @error('featured_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Diterbitkan</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-bs-dismiss="modal">Batal</button>
                <button type="submit" form="news-form" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Berita
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Berita -->
<div class="modal modal-blur fade" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-detail-content">
                <!-- Content will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/admin-berita.js') }}"></script>
@endpush
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
    .badge.bg-blue {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8) !important;
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
                    <i class="fas fa-file-alt me-2"></i>
                    Manajemen Konten
                </div>
                <h2 class="page-title">
                    <img src="{{ asset('images/logo 1.png') }}" alt="Logo Desa Timbala" style="height: 40px; margin-right: 10px;">
                    Publikasi Desa
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-outline-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-tambah-publikasi">
                        <i class="fas fa-plus me-2"></i>
                        Tambah Publikasi
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-tambah-publikasi">
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
                            <div class="subheader">Total Publikasi</div>
                        </div>
                        <div class="h1 mb-3">{{ $stats['total_publications'] }}</div>
                        <div class="d-flex align-items-center">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                <i class="fas fa-check-circle me-1"></i>
                                {{ $stats['active_publications'] }} Aktif
                            </span>
                            <span class="text-muted ms-2">dari total</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Dokumen</div>
                        </div>
                        <div class="h1 mb-3">{{ $stats['documents'] }}</div>
                        <div class="d-flex align-items-center">
                            <span class="text-danger d-inline-flex align-items-center lh-1">
                                <i class="fas fa-file-pdf me-1"></i>
                                PDF Files
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Media</div>
                        </div>
                        <div class="h1 mb-3">{{ $stats['videos'] + $stats['audios'] + $stats['images'] }}</div>
                        <div class="d-flex align-items-center">
                            <span class="text-primary d-inline-flex align-items-center lh-1">
                                <i class="fas fa-video me-1"></i>
                                Video/Audio/Gambar
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Total Download</div>
                        </div>
                        <div class="h1 mb-3">{{ number_format($stats['total_downloads']) }}</div>
                        <div class="d-flex align-items-center">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                <i class="fas fa-download me-1"></i>
                                Downloads
                            </span>
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
                            Daftar Publikasi
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
                                    <input type="text" class="form-control" placeholder="Cari publikasi...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option value="">Semua Tipe</option>
                                    <option value="dokumen">Dokumen</option>
                                    <option value="video">Video</option>
                                    <option value="audio">Audio</option>
                                    <option value="gambar">Gambar</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option value="">Semua Kategori</option>
                                    <option value="peraturan">Peraturan</option>
                                    <option value="laporan">Laporan</option>
                                    <option value="dokumen">Dokumen</option>
                                    <option value="lainnya">Lainnya</option>
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
                                        <th>Judul</th>
                                        <th>Tipe</th>
                                        <th>Kategori</th>
                                        <th>File</th>
                                        <th>Download</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th class="w-1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($publications as $publication)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar" style="background: linear-gradient(135deg, #2c5f2d, #97bc62);">
                                                        <i class="{{ $publication->type_icon }} text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-fill ms-3">
                                                    <div class="font-weight-medium">{{ $publication->title }}</div>
                                                    <div class="text-muted">{{ Str::limit($publication->description, 50) }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge {{ $publication->type === 'dokumen' ? 'bg-red' : ($publication->type === 'video' ? 'bg-blue' : ($publication->type === 'audio' ? 'bg-green' : 'bg-yellow')) }} text-light">
                                                {{ ucfirst($publication->type) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-blue text-light">{{ ucfirst($publication->category ?? 'Umum') }}</span>
                                        </td>
                                        <td>
                                            <div class="text-muted">
                                                <small>{{ $publication->file_name }}</small><br>
                                                <small>{{ $publication->file_size_formatted }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ number_format($publication->downloads) }}</span>
                                        </td>
                                        <td>
                                            @if($publication->is_active)
                                                <span class="badge bg-green text-light">Aktif</span>
                                            @else
                                                <span class="badge bg-yellow text-light">Nonaktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div>{{ $publication->created_at->format('d M Y') }}</div>
                                            <div class="text-muted">{{ $publication->created_at->format('H:i') }}</div>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-outline-primary" data-bs-toggle="tooltip" title="Lihat Detail" onclick="viewPublication({{ $publication->id }})" style="padding: 8px 12px; min-width: 40px;">
                                                    <i class="fas fa-eye me-1"></i>
                                                    <span class="d-none d-sm-inline">Lihat</span>
                                                </button>
                                                <button class="btn btn-outline-success" data-bs-toggle="tooltip" title="Download" onclick="downloadPublication({{ $publication->id }})" style="padding: 8px 12px; min-width: 40px;">
                                                    <i class="fas fa-download me-1"></i>
                                                    <span class="d-none d-sm-inline">Download</span>
                                                </button>
                                                <button class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Edit" onclick="editPublication({{ $publication->id }})" style="padding: 8px 12px; min-width: 40px;">
                                                    <i class="fas fa-edit me-1"></i>
                                                    <span class="d-none d-sm-inline">Edit</span>
                                                </button>
                                                <button class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Hapus" onclick="deletePublication({{ $publication->id }})" style="padding: 8px 12px; min-width: 40px;">
                                                    <i class="fas fa-trash me-1"></i>
                                                    <span class="d-none d-sm-inline">Hapus</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="fas fa-file-alt fa-3x mb-3"></i>
                                                <p>Belum ada publikasi. <a href="#" data-bs-toggle="modal" data-bs-target="#modal-tambah-publikasi">Tambah publikasi pertama</a></p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($publications->hasPages())
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="text-muted">
                                Menampilkan {{ $publications->firstItem() }} - {{ $publications->lastItem() }} dari {{ $publications->total() }} publikasi
                            </div>
                            <div>
                                {{ $publications->links() }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Publikasi -->
<div class="modal modal-blur fade" id="modal-tambah-publikasi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>
                    Tambah Publikasi Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="publication-form" method="POST" action="{{ route('admin.publications.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label">Judul Publikasi <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan judul publikasi" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tipe <span class="text-danger">*</span></label>
                                <select name="type" class="form-select @error('type') is-invalid @enderror" required>
                                    <option value="">Pilih Tipe</option>
                                    <option value="dokumen" {{ old('type') == 'dokumen' ? 'selected' : '' }}>Dokumen</option>
                                    <option value="video" {{ old('type') == 'video' ? 'selected' : '' }}>Video</option>
                                    <option value="audio" {{ old('type') == 'audio' ? 'selected' : '' }}>Audio</option>
                                    <option value="gambar" {{ old('type') == 'gambar' ? 'selected' : '' }}>Gambar</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Deskripsi publikasi (opsional)">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">File <span class="text-danger">*</span></label>
                                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" accept="*/*" required>
                                <small class="text-muted">Maksimal 10MB</small>
                                @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="category" class="form-select">
                                    <option value="">Pilih Kategori</option>
                                    <option value="peraturan" {{ old('category') == 'peraturan' ? 'selected' : '' }}>Peraturan</option>
                                    <option value="laporan" {{ old('category') == 'laporan' ? 'selected' : '' }}>Laporan</option>
                                    <option value="dokumen" {{ old('category') == 'dokumen' ? 'selected' : '' }}>Dokumen</option>
                                    <option value="lainnya" {{ old('category') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Penulis</label>
                                <input type="text" name="author" class="form-control" placeholder="Nama penulis" value="{{ old('author') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Publikasi</label>
                                <input type="date" name="published_date" class="form-control" value="{{ old('published_date') }}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-bs-dismiss="modal">Batal</button>
                <button type="submit" form="publication-form" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Publikasi
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Publikasi -->
<div class="modal modal-blur fade" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Publikasi</h5>
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
<script src="{{ asset('js/admin-publikasi.js') }}"></script>
@endpush
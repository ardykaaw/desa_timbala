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
    .service-card {
        border-left: 4px solid #2c5f2d;
        transition: all 0.3s ease;
    }
    .service-card:hover {
        border-left-color: #97bc62;
        transform: translateX(5px);
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
                    <i class="fas fa-cogs me-2"></i>
                    Manajemen Layanan
                </div>
                <h2 class="page-title">
                    <img src="{{ asset('images/logo 1.png') }}" alt="Logo Desa Timbala" style="height: 40px; margin-right: 10px;">
                    Layanan Desa
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-outline-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-tambah-layanan">
                        <i class="fas fa-plus me-2"></i>
                        Tambah Layanan
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-tambah-layanan">
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
        <!-- Error Messages -->
        @if(session('error') || isset($error))
        <div class="alert alert-danger alert-dismissible show" id="error-message">
            <div class="d-flex">
                <div>
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>Error!</strong> {{ session('error') ?? $error }}
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert"></a>
        </div>
        @endif
        <!-- Stats Cards -->
        <div class="row row-deck row-cards mb-4">
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Total Layanan</div>
                        </div>
                        <div class="h1 mb-3">{{ $stats['total_services'] }}</div>
                        <div class="d-flex align-items-center">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                <i class="fas fa-check-circle me-1"></i>
                                {{ $stats['active_services'] }} Aktif
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
                            <div class="subheader">Layanan Online</div>
                        </div>
                        <div class="h1 mb-3">{{ $stats['online_services'] }}</div>
                        <div class="d-flex align-items-center">
                            <span class="text-blue d-inline-flex align-items-center lh-1">
                                <i class="fas fa-globe me-1"></i>
                                {{ $stats['total_services'] > 0 ? round(($stats['online_services'] / $stats['total_services']) * 100) : 0 }}%
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
                            <div class="subheader">Layanan Offline</div>
                        </div>
                        <div class="h1 mb-3">{{ $stats['offline_services'] }}</div>
                        <div class="d-flex align-items-center">
                            <span class="text-yellow d-inline-flex align-items-center lh-1">
                                <i class="fas fa-building me-1"></i>
                                {{ $stats['total_services'] > 0 ? round(($stats['offline_services'] / $stats['total_services']) * 100) : 0 }}%
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
                            <div class="subheader">Pengguna Hari Ini</div>
                        </div>
                        <div class="h1 mb-3">{{ $stats['today_requests'] }}</div>
                        <div class="d-flex align-items-center">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                <i class="fas fa-users me-1"></i>
                                Pengajuan Hari Ini
                            </span>
                            <span class="text-muted ms-2">total: {{ $stats['pending_requests'] + $stats['processing_requests'] + $stats['completed_requests'] }}</span>
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
                            Daftar Layanan Desa
                        </h3>
                    </div>
                    <div class="card-body">
                        <!-- Services Grid -->
                        <div class="row">
                            @forelse($services as $service)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card service-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="flex-shrink-0">
                                                <div class="avatar avatar-lg" style="background: linear-gradient(135deg, #2c5f2d, #97bc62);">
                                                    <i class="fas fa-{{ $service->icon ?? 'cog' }} text-white"></i>
                                                </div>
                                            </div>
                                            <div class="flex-fill ms-3">
                                                <h4 class="mb-1">{{ $service->name }}</h4>
                                                <span class="badge {{ $service->type === 'online' ? 'bg-green' : 'bg-yellow' }} text-light">
                                                    {{ ucfirst($service->type) }}
                                                </span>
                                            </div>
                                        </div>
                                        <p class="text-muted mb-3">{{ Str::limit($service->description, 80) }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">
                                                <i class="fas fa-users me-1"></i>
                                                {{ $service->service_requests_count }} pengajuan
                                            </small>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-outline-primary" data-bs-toggle="tooltip" title="Lihat Detail" onclick="viewService({{ $service->id }})" style="padding: 8px 12px; min-width: 40px;">
                                                    <i class="fas fa-eye me-1"></i>
                                                    <span class="d-none d-sm-inline">Lihat</span>
                                                </button>
                                                <button class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Edit" onclick="editService({{ $service->id }})" style="padding: 8px 12px; min-width: 40px;">
                                                    <i class="fas fa-edit me-1"></i>
                                                    <span class="d-none d-sm-inline">Edit</span>
                                                </button>
                                                <button class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Hapus" onclick="deleteService({{ $service->id }})" style="padding: 8px 12px; min-width: 40px;">
                                                    <i class="fas fa-trash me-1"></i>
                                                    <span class="d-none d-sm-inline">Hapus</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="text-center py-5">
                                    <i class="fas fa-cogs fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">Belum ada layanan</h5>
                                    <p class="text-muted">Klik tombol "Tambah Layanan" untuk menambahkan layanan pertama</p>
                                </div>
                            </div>
                            @endforelse
                        </div>
                        
                        <!-- Service Requests Table -->
                        @if($serviceRequests->count() > 0)
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fas fa-clipboard-list me-2"></i>
                                            Pengajuan Layanan Terbaru
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-vcenter">
                                                <thead>
                                                    <tr>
                                                        <th>No. Pengajuan</th>
                                                        <th>Nama</th>
                                                        <th>Layanan</th>
                                                        <th>Status</th>
                                                        <th>Tanggal & Waktu Pengajuan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($serviceRequests as $request)
                                                    <tr>
                                                        <td>
                                                            <span class="text-muted">{{ $request->request_number }}</span>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <div class="font-weight-medium">{{ $request->full_name }}</div>
                                                                <div class="text-muted">{{ $request->phone }}</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>{{ $request->service->name }}</div>
                                                            <div class="text-muted">{{ $request->service->category }}</div>
                                                        </td>
                                                        <td>
                                                            <span class="badge {{ $request->status_badge }} text-light">
                                                                {{ $request->status_text }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="font-weight-medium">{{ $request->created_at->format('d M Y') }}</div>
                                                            <div class="text-muted">
                                                                <i class="fas fa-clock me-1"></i>{{ $request->created_at->format('H:i') }} WITA
                                                            </div>
                                                            <div class="text-muted small">
                                                                <i class="fas fa-birthday-cake me-1"></i>{{ \Carbon\Carbon::parse($request->birth_date)->format('d M Y') }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group" role="group">
                                                                <button class="btn btn-outline-primary" onclick="viewRequest({{ $request->id }})" data-bs-toggle="tooltip" title="Lihat Detail" style="padding: 8px 12px; min-width: 40px;">
                                                                    <i class="fas fa-eye me-1"></i>
                                                                    <span class="d-none d-sm-inline">Lihat</span>
                                                                </button>
                                                                <button class="btn btn-outline-warning" onclick="updateStatus({{ $request->id }})" data-bs-toggle="tooltip" title="Update Status" style="padding: 8px 12px; min-width: 40px;">
                                                                    <i class="fas fa-edit me-1"></i>
                                                                    <span class="d-none d-sm-inline">Update</span>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer pb-0">
                                        @if ($serviceRequests->hasPages())
                                            <div class="d-flex justify-content-center">
                                                <ul class="pagination">
                                                    {{-- Tombol sebelumnya --}}
                                                    <li class="page-item {{ $serviceRequests->onFirstPage() ? 'disabled' : '' }}">
                                                        <a class="page-link" href="{{ $serviceRequests->previousPageUrl() ?? '#' }}" tabindex="-1"
                                                            aria-disabled="{{ $serviceRequests->onFirstPage() ? 'true' : 'false' }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                                                <path d="M15 6l-6 6l6 6"></path>
                                                            </svg>
                                                        </a>
                                                    </li>

                                                    {{-- Tombol nomor halaman --}}
                                                    @foreach ($serviceRequests->getUrlRange(1, $serviceRequests->lastPage()) as $page => $url)
                                                        <li class="page-item {{ $serviceRequests->currentPage() == $page ? 'active' : '' }}">
                                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                        </li>
                                                    @endforeach

                                                    {{-- Tombol selanjutnya --}}
                                                    <li class="page-item {{ $serviceRequests->hasMorePages() ? '' : 'disabled' }}">
                                                        <a class="page-link" href="{{ $serviceRequests->nextPageUrl() ?? '#' }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                                                <path d="M9 6l6 6l-6 6"></path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Layanan -->
<div class="modal modal-blur fade" id="modal-tambah-layanan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>
                    Tambah Layanan Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-tambah-layanan" method="POST" action="{{ route('admin.services.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama layanan" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                                <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="administrasi" {{ old('category') == 'administrasi' ? 'selected' : '' }}>Administrasi</option>
                                    <option value="kependudukan" {{ old('category') == 'kependudukan' ? 'selected' : '' }}>Kependudukan</option>
                                    <option value="keuangan" {{ old('category') == 'keuangan' ? 'selected' : '' }}>Keuangan</option>
                                    <option value="pembangunan" {{ old('category') == 'pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Layanan <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" placeholder="Deskripsikan layanan yang akan ditambahkan..." required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tipe Layanan <span class="text-danger">*</span></label>
                                <select name="type" class="form-select @error('type') is-invalid @enderror" required>
                                    <option value="online" {{ old('type') == 'online' ? 'selected' : '' }}>Online</option>
                                    <option value="offline" {{ old('type') == 'offline' ? 'selected' : '' }}>Offline</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Icon</label>
                                <select name="icon" class="form-select">
                                    <option value="id-card" {{ old('icon') == 'id-card' ? 'selected' : '' }}>KTP</option>
                                    <option value="home" {{ old('icon') == 'home' ? 'selected' : '' }}>Domisili</option>
                                    <option value="file-alt" {{ old('icon') == 'file-alt' ? 'selected' : '' }}>Surat Keterangan</option>
                                    <option value="money-bill-wave" {{ old('icon') == 'money-bill-wave' ? 'selected' : '' }}>PBB</option>
                                    <option value="baby" {{ old('icon') == 'baby' ? 'selected' : '' }}>Akta Kelahiran</option>
                                    <option value="handshake" {{ old('icon') == 'handshake' ? 'selected' : '' }}>Bantuan Sosial</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Hari Proses</label>
                                <input type="number" name="processing_days" class="form-control" placeholder="3" value="{{ old('processing_days', 3) }}" min="1" max="30">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Biaya (Rp)</label>
                                <input type="number" name="fee" class="form-control" placeholder="0" value="{{ old('fee', 0) }}" min="0">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Persyaratan</label>
                                <textarea name="requirements" class="form-control" rows="3" placeholder="Masukkan persyaratan yang diperlukan...">{{ old('requirements') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Prosedur</label>
                                <textarea name="procedures" class="form-control" rows="3" placeholder="Masukkan prosedur yang harus diikuti...">{{ old('procedures') }}</textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-bs-dismiss="modal">Batal</button>
                <button type="submit" form="form-tambah-layanan" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Layanan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Pengajuan -->
<div class="modal modal-blur fade" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pengajuan Layanan</h5>
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

<!-- Modal Edit Layanan -->
<div class="modal modal-blur fade" id="modal-edit-service" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>
                    Edit Layanan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-service-form" method="POST" action="">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Masukkan nama layanan" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                                <select name="category" class="form-select" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="administrasi">Administrasi</option>
                                    <option value="kependudukan">Kependudukan</option>
                                    <option value="keuangan">Keuangan</option>
                                    <option value="pembangunan">Pembangunan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Layanan <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" rows="4" placeholder="Deskripsikan layanan..." required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tipe Layanan <span class="text-danger">*</span></label>
                                <select name="type" class="form-select" required>
                                    <option value="online">Online</option>
                                    <option value="offline">Offline</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Icon</label>
                                <select name="icon" class="form-select">
                                    <option value="id-card">KTP</option>
                                    <option value="home">Domisili</option>
                                    <option value="file-alt">Surat Keterangan</option>
                                    <option value="money-bill-wave">PBB</option>
                                    <option value="baby">Akta Kelahiran</option>
                                    <option value="handshake">Bantuan Sosial</option>
                                    <option value="briefcase">Usaha</option>
                                    <option value="heart">Belum Menikah</option>
                                    <option value="users">Keramaian</option>
                                    <option value="plane">Bepergian</option>
                                    <option value="hand-holding-heart">Tidak Mampu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Hari Proses</label>
                                <input type="number" name="processing_days" class="form-control" placeholder="3" min="1" max="30">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Biaya (Rp)</label>
                                <input type="number" name="fee" class="form-control" placeholder="0" min="0">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Persyaratan</label>
                                <textarea name="requirements" class="form-control" rows="3" placeholder="Masukkan persyaratan yang diperlukan..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Prosedur</label>
                                <textarea name="procedures" class="form-control" rows="3" placeholder="Masukkan prosedur yang harus diikuti..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1">
                                    <label class="form-check-label" for="is_active">
                                        Layanan Aktif
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-bs-dismiss="modal">Batal</button>
                <button type="submit" form="edit-service-form" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Status -->
<div class="modal modal-blur fade" id="modal-status" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Status Pengajuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-update-status">
                <div class="modal-body">
                    <input type="hidden" id="request_id" name="request_id">
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" id="status" required>
                            <option value="pending">Menunggu</option>
                            <option value="processing">Diproses</option>
                            <option value="completed">Selesai</option>
                            <option value="rejected">Ditolak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Catatan Admin</label>
                        <textarea class="form-control" name="admin_notes" id="admin_notes" rows="3" placeholder="Masukkan catatan untuk pengajuan ini"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/admin-layanan.js') }}"></script>
<script>
    // Set base URL for API calls
    window.API_BASE_URL = '{{ url("/") }}';
    window.ADMIN_BASE_URL = '{{ url("/admin") }}';
</script>
@endpush

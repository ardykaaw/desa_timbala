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
                                    <input type="text" class="form-control" placeholder="Cari layanan...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option value="">Semua Kategori</option>
                                    <option value="administrasi">Administrasi</option>
                                    <option value="kependudukan">Kependudukan</option>
                                    <option value="keuangan">Keuangan</option>
                                    <option value="pembangunan">Pembangunan</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option value="">Semua Status</option>
                                    <option value="online">Online</option>
                                    <option value="offline">Offline</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary w-100">
                                    <i class="fas fa-filter me-1"></i>Filter
                                </button>
                            </div>
                        </div>

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
                        <!-- Debug: Service Requests Count: {{ $serviceRequests->count() }} -->
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
                                                        <th>Tanggal</th>
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
                                                            <div>{{ $request->created_at->format('d M Y') }}</div>
                                                            <div class="text-muted">{{ $request->created_at->format('H:i') }}</div>
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
                                        {{ $serviceRequests->links() }}
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
<script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Reset form when modal is hidden
    document.getElementById('modal-tambah-layanan').addEventListener('hidden.bs.modal', function () {
        // Reset form
        document.getElementById('form-tambah-layanan').reset();
        
        // Reset form action to create
        document.getElementById('form-tambah-layanan').action = '{{ route("admin.services.store") }}';
        document.getElementById('form-tambah-layanan').method = 'POST';
        
        // Remove method override
        const methodInput = document.getElementById('form-tambah-layanan').querySelector('input[name="_method"]');
        if (methodInput) {
            methodInput.remove();
        }
        
        // Reset modal title
        document.querySelector('#modal-tambah-layanan .modal-title').innerHTML = '<i class="fas fa-plus me-2"></i>Tambah Layanan Baru';
        
        // Clear validation errors
        document.querySelectorAll('.is-invalid').forEach(el => {
            el.classList.remove('is-invalid');
        });
        document.querySelectorAll('.invalid-feedback').forEach(el => {
            el.remove();
        });
    });

    // Search functionality
    const searchInput = document.querySelector('input[placeholder="Cari layanan..."]');
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const serviceCards = document.querySelectorAll('.service-card');
            
            serviceCards.forEach(card => {
                const title = card.querySelector('h4').textContent.toLowerCase();
                if (title.includes(searchTerm)) {
                    card.closest('.col-md-6').style.display = '';
                } else {
                    card.closest('.col-md-6').style.display = 'none';
                }
            });
        });
    }

    // Filter functionality
    const filterButton = document.querySelector('button[class*="btn-primary"]');
    if (filterButton) {
        filterButton.addEventListener('click', function() {
            const categoryFilter = document.querySelector('select').value;
            const statusFilter = document.querySelectorAll('select')[1].value;
            const serviceCards = document.querySelectorAll('.service-card');
            
            serviceCards.forEach(card => {
                let showCard = true;
                
                if (categoryFilter) {
                    // This would need to be implemented based on data attributes
                    // For now, just show all cards
                }
                
                if (statusFilter) {
                    const status = card.querySelector('.badge').textContent.toLowerCase();
                    if (!status.includes(statusFilter)) {
                        showCard = false;
                    }
                }
                
                card.closest('.col-md-6').style.display = showCard ? '' : 'none';
            });
        });
    }

    // Form submission for services
    const formTambahLayanan = document.getElementById('form-tambah-layanan');
    if (formTambahLayanan) {
        formTambahLayanan.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
        submitBtn.disabled = true;
        
        // Determine if it's create or update
        const isUpdate = this.method === 'PUT';
        const url = this.action;
        
        // Submit form
        fetch(url, {
            method: isUpdate ? 'PUT' : 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Show success message
                showAlert('success', data.message);
                
                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('modal-tambah-layanan'));
                modal.hide();
                
                // Reload page to show new data
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showAlert('error', data.message || 'Terjadi kesalahan saat menyimpan layanan');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat menyimpan layanan: ' + error.message);
        })
        .finally(() => {
            // Reset button state
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        });
    });

    // Update status form submission
    document.getElementById('form-update-status').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const requestId = formData.get('request_id');
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengupdate...';
        submitBtn.disabled = true;
        
        // Submit form
        fetch(`/admin/service-requests/${requestId}/update-status`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showAlert('success', data.message);
                
                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('modal-status'));
                modal.hide();
                
                // Reload page to show updated data
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showAlert('error', data.message || 'Terjadi kesalahan saat mengupdate status');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat mengupdate status');
        })
        .finally(() => {
            // Reset button state
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        });
    });

    // View request function
    function viewRequest(id) {
        console.log('View request called with ID:', id);
        
        // Show loading state
        document.getElementById('modal-detail-content').innerHTML = `
            <div class="text-center py-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2">Memuat detail pengajuan...</p>
            </div>
        `;
        
        // Show modal first
        const modal = new bootstrap.Modal(document.getElementById('modal-detail'));
        modal.show();
        
        // Load request details via AJAX
        fetch(`/admin/service-requests/${id}`)
        .then(response => {
            console.log('Response status:', response.status);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            if (data.success) {
                const request = data.request;
                const content = `
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Informasi Pengajuan</h6>
                            <table class="table table-sm">
                                <tr><td><strong>No. Pengajuan:</strong></td><td>${request.request_number}</td></tr>
                                <tr><td><strong>Layanan:</strong></td><td>${request.service.name}</td></tr>
                                <tr><td><strong>Status:</strong></td><td><span class="badge ${request.status_badge} text-light">${request.status_text}</span></td></tr>
                                <tr><td><strong>Tanggal:</strong></td><td>${new Date(request.created_at).toLocaleDateString('id-ID')}</td></tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Data Pemohon</h6>
                            <table class="table table-sm">
                                <tr><td><strong>Nama:</strong></td><td>${request.full_name}</td></tr>
                                <tr><td><strong>NIK:</strong></td><td>${request.nik}</td></tr>
                                <tr><td><strong>Tempat/Tgl Lahir:</strong></td><td>${request.birth_place}, ${new Date(request.birth_date).toLocaleDateString('id-ID')}</td></tr>
                                <tr><td><strong>Jenis Kelamin:</strong></td><td>${request.gender}</td></tr>
                                <tr><td><strong>Alamat:</strong></td><td>${request.address}</td></tr>
                                <tr><td><strong>Telepon:</strong></td><td>${request.phone}</td></tr>
                                <tr><td><strong>Email:</strong></td><td>${request.email || '-'}</td></tr>
                            </table>
                        </div>
                    </div>
                    ${request.additional_info ? `<div class="mt-3"><h6>Keterangan Tambahan</h6><p>${request.additional_info}</p></div>` : ''}
                    ${request.admin_notes ? `<div class="mt-3"><h6>Catatan Admin</h6><p>${request.admin_notes}</p></div>` : ''}
                `;
                
                document.getElementById('modal-detail-content').innerHTML = content;
            } else {
                document.getElementById('modal-detail-content').innerHTML = `
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Gagal memuat detail pengajuan: ${data.message || 'Terjadi kesalahan'}
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('modal-detail-content').innerHTML = `
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Terjadi kesalahan saat memuat detail pengajuan: ${error.message}
                </div>
            `;
        });
    }

    // Update status function
    function updateStatus(id) {
        console.log('Update status called with ID:', id);
        
        // Set request ID
        document.getElementById('request_id').value = id;
        
        // Reset form
        document.getElementById('form-update-status').reset();
        document.getElementById('request_id').value = id;
        
        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('modal-status'));
        modal.show();
    }

    // Edit service function
    function editService(id) {
        console.log('Edit service called with ID:', id);
        
        // Load service data via AJAX
        fetch(`/admin/services/${id}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                const service = data.service;
                
                // Populate form with service data
                document.querySelector('#form-tambah-layanan input[name="name"]').value = service.name;
                document.querySelector('#form-tambah-layanan select[name="category"]').value = service.category;
                document.querySelector('#form-tambah-layanan textarea[name="description"]').value = service.description;
                document.querySelector('#form-tambah-layanan select[name="type"]').value = service.type;
                document.querySelector('#form-tambah-layanan select[name="icon"]').value = service.icon || 'id-card';
                document.querySelector('#form-tambah-layanan input[name="processing_days"]').value = service.processing_days || 3;
                document.querySelector('#form-tambah-layanan input[name="fee"]').value = service.fee || 0;
                document.querySelector('#form-tambah-layanan textarea[name="requirements"]').value = service.requirements || '';
                document.querySelector('#form-tambah-layanan textarea[name="procedures"]').value = service.procedures || '';
                
                // Change form action to update
                document.getElementById('form-tambah-layanan').action = `/admin/services/${id}`;
                document.getElementById('form-tambah-layanan').method = 'PUT';
                
                // Add hidden input for method override
                let methodInput = document.getElementById('form-tambah-layanan').querySelector('input[name="_method"]');
                if (!methodInput) {
                    methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'PUT';
                    document.getElementById('form-tambah-layanan').appendChild(methodInput);
                } else {
                    methodInput.value = 'PUT';
                }
                
                // Change modal title
                document.querySelector('#modal-tambah-layanan .modal-title').innerHTML = '<i class="fas fa-edit me-2"></i>Edit Layanan';
                
                // Show modal
                const modal = new bootstrap.Modal(document.getElementById('modal-tambah-layanan'));
                modal.show();
            } else {
                showAlert('error', 'Gagal memuat data layanan');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat memuat data layanan: ' + error.message);
        });
    }

    // Delete service function
    function deleteService(id) {
        console.log('Delete service called with ID:', id);
        
        if (confirm('Apakah Anda yakin ingin menghapus layanan ini? Tindakan ini tidak dapat dibatalkan.')) {
            // Show loading state
            showAlert('info', 'Menghapus layanan...');
            
            fetch(`/admin/services/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                console.log('Delete response status:', response.status);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Delete response data:', data);
                if (data.success) {
                    showAlert('success', data.message);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    showAlert('error', data.message || 'Gagal menghapus layanan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('error', 'Terjadi kesalahan saat menghapus layanan: ' + error.message);
            });
        }
    }

    // View service function
    function viewService(id) {
        console.log('View service called with ID:', id);
        
        // Load service data via AJAX
        fetch(`/admin/services/${id}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                const service = data.service;
                const content = `
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Informasi Layanan</h6>
                            <table class="table table-sm">
                                <tr><td><strong>Nama:</strong></td><td>${service.name}</td></tr>
                                <tr><td><strong>Kategori:</strong></td><td>${service.category}</td></tr>
                                <tr><td><strong>Tipe:</strong></td><td><span class="badge ${service.type === 'online' ? 'bg-green' : 'bg-yellow'} text-light">${service.type}</span></td></tr>
                                <tr><td><strong>Hari Proses:</strong></td><td>${service.processing_days} hari</td></tr>
                                <tr><td><strong>Biaya:</strong></td><td>Rp ${service.fee ? service.fee.toLocaleString('id-ID') : '0'}</td></tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Deskripsi</h6>
                            <p>${service.description}</p>
                            ${service.requirements ? `<h6>Persyaratan</h6><p>${service.requirements}</p>` : ''}
                            ${service.procedures ? `<h6>Prosedur</h6><p>${service.procedures}</p>` : ''}
                        </div>
                    </div>
                `;
                
                // Show modal with service details
                document.getElementById('modal-detail-content').innerHTML = content;
                document.querySelector('#modal-detail .modal-title').innerHTML = 'Detail Layanan';
                const modal = new bootstrap.Modal(document.getElementById('modal-detail'));
                modal.show();
            } else {
                showAlert('error', 'Gagal memuat data layanan');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat memuat data layanan: ' + error.message);
        });
    }

    // Show alert function
    function showAlert(type, message) {
        const alertDiv = document.createElement('div');
        let alertClass = 'alert-success';
        
        switch(type) {
            case 'error':
                alertClass = 'alert-danger';
                break;
            case 'info':
                alertClass = 'alert-info';
                break;
            case 'warning':
                alertClass = 'alert-warning';
                break;
            default:
                alertClass = 'alert-success';
        }
        
        alertDiv.className = `alert ${alertClass} alert-dismissible fade show`;
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        
        // Insert at the top of the page
        const container = document.querySelector('.page-wrapper');
        container.insertBefore(alertDiv, container.firstChild);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }
</script>
@endpush


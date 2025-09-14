@extends('layouts.main')

@section('content')
<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        <i class="ti ti-building-community me-2"></i>
                        Layanan Desa Timbala
                    </h2>
                    <div class="text-muted mt-1">Ajukan layanan desa dengan mudah dan cepat</div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <!-- Success Messages -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible show" id="success-message">
                <div class="d-flex">
                    <div>
                        <i class="ti ti-check-circle me-2"></i>
                        <strong>Berhasil!</strong> {{ session('success') }}
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert"></a>
            </div>
            @endif

            <div class="row">
                <!-- Form Pengajuan Layanan -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ti ti-file-plus me-2"></i>
                                Form Pengajuan Layanan
                            </h3>
                        </div>
                        <div class="card-body">
                            <form id="service-form" method="POST" action="{{ route('service.submit') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">Jenis Layanan</label>
                                        <select name="service_type" class="form-select" required>
                                            <option value="">Pilih Jenis Layanan</option>
                                            @foreach($services as $service)
                                                <option value="{{ $service->name }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">Nama Lengkap</label>
                                        <input type="text" name="full_name" class="form-control" placeholder="Masukkan nama lengkap" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">NIK</label>
                                        <input type="text" name="nik" class="form-control" placeholder="Masukkan 16 digit NIK" maxlength="16" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">Tempat Lahir</label>
                                        <input type="text" name="birth_place" class="form-control" placeholder="Masukkan tempat lahir" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">Tanggal Lahir</label>
                                        <input type="date" name="birth_date" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">Jenis Kelamin</label>
                                        <select name="gender" class="form-select" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label required">Alamat Lengkap</label>
                                        <textarea name="address" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">No. Telepon</label>
                                        <input type="tel" name="phone" class="form-control" placeholder="Masukkan nomor telepon aktif" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Masukkan email (opsional)">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Upload Dokumen Pendukung</label>
                                        <input type="file" name="attachments[]" class="form-control" accept="image/*,application/pdf" multiple>
                                        <small class="text-muted">Format: JPG, PNG, PDF. Maksimal 2MB per file</small>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Keterangan Tambahan</label>
                                        <textarea name="additional_info" class="form-control" rows="3" placeholder="Jelaskan keperluan pembuatan surat"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ti ti-send me-2"></i>
                                            Kirim Pengajuan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Informasi Layanan -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ti ti-info-circle me-2"></i>
                                Informasi Layanan
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <h4 class="text-primary">Layanan Tersedia</h4>
                                <ul class="list-unstyled">
                                    @foreach($services as $service)
                                    <li class="mb-2">
                                        <i class="ti ti-check text-success me-2"></i>
                                        {{ $service->name }}
                                        <span class="badge {{ $service->type === 'online' ? 'bg-success' : 'bg-warning' }} text-light ms-2">
                                            {{ ucfirst($service->type) }}
                                        </span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            <div class="mb-3">
                                <h4 class="text-primary">Syarat Umum</h4>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="ti ti-arrow-right text-info me-2"></i>
                                        Fotokopi KTP/KK
                                    </li>
                                    <li class="mb-2">
                                        <i class="ti ti-arrow-right text-info me-2"></i>
                                        Pas foto 3x4 (2 lembar)
                                    </li>
                                    <li class="mb-2">
                                        <i class="ti ti-arrow-right text-info me-2"></i>
                                        Surat pengantar RT/RW
                                    </li>
                                </ul>
                            </div>

                            <div class="mb-3">
                                <h4 class="text-primary">Waktu Proses</h4>
                                <div class="text-muted">
                                    <i class="ti ti-clock me-2"></i>
                                    Layanan online: 1-3 hari kerja
                                </div>
                                <div class="text-muted">
                                    <i class="ti ti-clock me-2"></i>
                                    Layanan offline: 3-7 hari kerja
                                </div>
                            </div>

                            <div class="mb-3">
                                <h4 class="text-primary">Kontak</h4>
                                <div class="text-muted">
                                    <i class="ti ti-phone me-2"></i>
                                    (021) 1234-5678
                                </div>
                                <div class="text-muted">
                                    <i class="ti ti-mail me-2"></i>
                                    desa@timbala.go.id
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Set CSRF token globally
    window.Laravel = {
        csrfToken: '{{ csrf_token() }}'
    };
</script>
<script src="{{ asset('js/layanan.js') }}"></script>
@endpush
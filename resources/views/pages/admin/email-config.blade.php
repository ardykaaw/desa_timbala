@extends('layouts.admin')

@section('title', 'Konfigurasi Email')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Konfigurasi Email Notifikasi</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Konfigurasi Email</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-envelope me-2"></i>
                        Pengaturan Email Notifikasi
                    </h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form action="{{ route('admin.email-config.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="admin_email" class="form-label">
                                        <i class="fas fa-at me-1"></i>
                                        Email Admin
                                    </label>
                                    <input type="email" 
                                           class="form-control @error('admin_email') is-invalid @enderror" 
                                           id="admin_email" 
                                           name="admin_email" 
                                           value="{{ old('admin_email', config('admin.email')) }}"
                                           placeholder="admin@desatimbala.com"
                                           required>
                                    @error('admin_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Email yang akan menerima notifikasi</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="admin_name" class="form-label">
                                        <i class="fas fa-user me-1"></i>
                                        Nama Admin
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('admin_name') is-invalid @enderror" 
                                           id="admin_name" 
                                           name="admin_name" 
                                           value="{{ old('admin_name', config('admin.name')) }}"
                                           placeholder="Admin Desa Timbala"
                                           required>
                                    @error('admin_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h6 class="mb-3">
                            <i class="fas fa-bell me-2"></i>
                            Pengaturan Notifikasi
                        </h6>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="notify_service_created" 
                                           name="notify_service_created" 
                                           value="1"
                                           {{ config('admin.notifications.service_created', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="notify_service_created">
                                        <strong>Notifikasi Layanan Baru</strong>
                                        <br>
                                        <small class="text-muted">Kirim email ketika ada layanan baru ditambahkan</small>
                                    </label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="notify_service_updated" 
                                           name="notify_service_updated" 
                                           value="1"
                                           {{ config('admin.notifications.service_updated', false) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="notify_service_updated">
                                        <strong>Notifikasi Update Layanan</strong>
                                        <br>
                                        <small class="text-muted">Kirim email ketika layanan diupdate</small>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="notify_service_deleted" 
                                           name="notify_service_deleted" 
                                           value="1"
                                           {{ config('admin.notifications.service_deleted', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="notify_service_deleted">
                                        <strong>Notifikasi Hapus Layanan</strong>
                                        <br>
                                        <small class="text-muted">Kirim email ketika layanan dihapus</small>
                                    </label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="notify_news_created" 
                                           name="notify_news_created" 
                                           value="1"
                                           {{ config('admin.notifications.news_created', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="notify_news_created">
                                        <strong>Notifikasi Berita Baru</strong>
                                        <br>
                                        <small class="text-muted">Kirim email ketika ada berita baru</small>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>
                                Simpan Konfigurasi
                            </button>
                            
                            <button type="button" class="btn btn-outline-info" onclick="testEmail()">
                                <i class="fas fa-paper-plane me-1"></i>
                                Test Email
                            </button>
                            
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-1"></i>
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Informasi
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h6><i class="fas fa-lightbulb me-1"></i> Tips Konfigurasi Email:</h6>
                        <ul class="mb-0 small">
                            <li>Pastikan email admin valid dan aktif</li>
                            <li>Email akan dikirim otomatis sesuai pengaturan</li>
                            <li>Gunakan tombol "Test Email" untuk memverifikasi</li>
                            <li>Notifikasi dapat diaktifkan/nonaktifkan sesuai kebutuhan</li>
                        </ul>
                    </div>

                    <div class="alert alert-warning">
                        <h6><i class="fas fa-exclamation-triangle me-1"></i> Catatan Penting:</h6>
                        <ul class="mb-0 small">
                            <li>Pastikan konfigurasi SMTP sudah benar di .env</li>
                            <li>Email mungkin masuk ke folder spam</li>
                            <li>Cek log jika email tidak terkirim</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-cog me-2"></i>
                        Status Konfigurasi
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="text-center p-2 border rounded">
                                <div class="text-muted small">Email Admin</div>
                                <div class="fw-bold {{ config('admin.email') ? 'text-success' : 'text-danger' }}">
                                    {{ config('admin.email') ? '✓ Terkonfigurasi' : '✗ Belum Dikonfigurasi' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-2 border rounded">
                                <div class="text-muted small">SMTP</div>
                                <div class="fw-bold {{ config('mail.mailer') ? 'text-success' : 'text-danger' }}">
                                    {{ config('mail.mailer') ? '✓ Aktif' : '✗ Belum Dikonfigurasi' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Test Email Modal -->
<div class="modal fade" id="testEmailModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-paper-plane me-2"></i>
                    Test Email
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="testEmailForm">
                    <div class="mb-3">
                        <label for="test_email" class="form-label">Email Tujuan</label>
                        <input type="email" class="form-control" id="test_email" required>
                        <div class="form-text">Masukkan email untuk mengirim test notifikasi</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="sendTestEmail()">
                    <i class="fas fa-paper-plane me-1"></i>
                    Kirim Test
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function testEmail() {
    const modal = new bootstrap.Modal(document.getElementById('testEmailModal'));
    modal.show();
}

function sendTestEmail() {
    const email = document.getElementById('test_email').value;
    
    if (!email) {
        alert('Masukkan email tujuan!');
        return;
    }
    
    // Show loading
    const btn = event.target;
    const originalText = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Mengirim...';
    btn.disabled = true;
    
    // Send AJAX request
    fetch('{{ route("admin.email-config.test") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ email: email })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Email test berhasil dikirim! Cek inbox ' + email);
            bootstrap.Modal.getInstance(document.getElementById('testEmailModal')).hide();
        } else {
            alert('Gagal mengirim email: ' + (data.message || 'Unknown error'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengirim email test');
    })
    .finally(() => {
        btn.innerHTML = originalText;
        btn.disabled = false;
    });
}
</script>
@endpush

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
    .avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #2c5f2d, #97bc62);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: white;
        margin: 0 auto;
    }
    .form-control:focus {
        border-color: #2c5f2d;
        box-shadow: 0 0 0 0.2rem rgba(44, 95, 45, 0.25);
    }
    .form-label {
        font-weight: 600;
        color: #2c5f2d;
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
                    <i class="fas fa-user me-2"></i>
                    Pengaturan Akun
                </div>
                <h2 class="page-title">
                    <img src="{{ asset('images/logo 1.png') }}" alt="Logo Desa Timbala" style="height: 40px; margin-right: 10px;">
                    Profil Admin
                </h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <!-- Profil Info -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar mb-3">
                            <i class="fas fa-user"></i>
                        </div>
                        <h3 class="card-title">{{ auth()->user()->name }}</h3>
                        <p class="text-muted">{{ auth()->user()->email }}</p>
                        <span class="badge bg-green text-light">{{ ucfirst(auth()->user()->role) }}</span>
                        <div class="mt-3">
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>
                                Bergabung: {{ auth()->user()->created_at->format('d M Y') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Ganti Password -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-lock me-2"></i>
                            Ganti Password
                        </h3>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <div class="d-flex">
                                    <div>
                                        <i class="fas fa-check-circle me-2"></i>
                                        {{ session('success') }}
                                    </div>
                                </div>
                                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <div class="d-flex">
                                    <div>
                                        <i class="fas fa-exclamation-circle me-2"></i>
                                        {{ session('error') }}
                                    </div>
                                </div>
                                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                            </div>
                        @endif

                        <form action="{{ route('admin.profile.update-password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Password Lama <span class="text-danger">*</span></label>
                                        <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" 
                                               placeholder="Masukkan password lama" required>
                                        @error('current_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password Baru <span class="text-danger">*</span></label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                                               placeholder="Masukkan password baru" required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" 
                                               placeholder="Konfirmasi password baru" required>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <strong>Tips Password yang Aman:</strong>
                                        <ul class="mb-0 mt-2">
                                            <li>Minimal 8 karakter</li>
                                            <li>Menggunakan kombinasi huruf besar, huruf kecil, angka, dan simbol</li>
                                            <li>Hindari menggunakan informasi pribadi</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>
                                        Update Password
                                    </button>
                                    <button type="button" class="btn btn-secondary" onclick="resetForm()">
                                        <i class="fas fa-undo me-2"></i>
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function resetForm() {
        document.querySelector('form').reset();
    }

    // Auto hide alerts after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
</script>
@endpush

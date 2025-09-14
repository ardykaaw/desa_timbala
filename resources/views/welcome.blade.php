@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Sistem Informasi Desa Timbala
                    </div>
                    <h2 class="page-title">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        Dashboard Admin
                    </h2>
                </div>
                <!-- Page title actions -->
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <img src="{{ asset('images/logo 1.png') }}" alt="Logo Desa Timbala" style="height: 80px; margin-bottom: 20px;">
                            <h3 class="mt-3">Selamat Datang di Dashboard Admin</h3>
                            <p class="text-muted">Sistem Informasi Desa Timbala</p>
                            <div class="mt-4">
                                <a href="{{ route('home') }}" class="btn btn-primary me-2">
                                    <i class="fas fa-home me-2"></i>Kembali ke Website
                                </a>
                                <a href="{{ route('logout') }}" class="btn btn-outline-danger" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
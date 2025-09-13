@extends('layouts.main')

@section('title', 'Struktur Organisasi - Sistem Informasi Desa Timbala')

@section('content')
<!-- Struktur Organisasi Section -->
<section class="content-section" id="struktur-section">
    <div class="container">
        <h2 class="section-title">Struktur Organisasi Pemerintahan Desa</h2>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="org-card">
                    <img src="{{ asset('images/M. YASIR.jpg') }}" alt="Kepala Desa" class="org-photo">
                    <p class="org-position">Kepala Desa</p>
                    <p class="org-name">M. YASIR, S.M</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="org-card">
                    <img src="{{ asset('images/foto sekdes.jpg') }}" alt="Sekretaris Desa" class="org-photo">
                    <p class="org-position">Sekretaris Desa</p>
                    <p class="org-name">ARISMAN, S.Pd</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="org-card">
                    <img src="{{ asset('images/placeholder.png') }}" alt="Kasi Pemerintahan" class="org-photo">
                    <p class="org-position">Kasi Pemerintahan</p>
                    <p class="org-name">...........</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="org-card">
                    <img src="{{ asset('images/kasi kesejahtraan.jpg') }}" alt="Kasi Kesejahteraan" class="org-photo">
                    <p class="org-position">Kasi Kesejahteraan</p>
                    <p class="org-name">HARMAWATI</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="org-card">
                    <img src="{{ asset('images/kasi pelayanan.jpg') }}" alt="Kasi Pelayanan" class="org-photo">
                    <p class="org-position">Kasi Pelayanan</p>
                    <p class="org-name">AGUSTAN</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="org-card">
                    <img src="{{ asset('images/kaur keuangan.jpg') }}" alt="Kaur Keuangan" class="org-photo">
                    <p class="org-position">Kaur Keuangan</p>
                    <p class="org-name">RENOLD TASLIM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="org-card">
                    <img src="{{ asset('images/foto perencanaan.jpg') }}" alt="Kaur Perencanaan" class="org-photo">
                    <p class="org-position">Kaur Perencanaan</p>
                    <p class="org-name">HAMZAH</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="org-card">
                    <img src="{{ asset('images/kaur umum.jpg') }}" alt="Kaur Umum" class="org-photo">
                    <p class="org-position">Kaur Umum</p>
                    <p class="org-name">MUHAMMAD FAJARUDDIN</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="org-card">
                    <img src="{{ asset('images/placeholder.png') }}" alt="Kepala Dusun Timbala 1" class="org-photo">
                    <p class="org-position">KEPALA DUSUN TIMBALA 1</p>
                    <p class="org-name">IRFAN</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="org-card">
                    <img src="{{ asset('images/foto padusun 2.jpg') }}" alt="Kepala Dusun Timbala 2" class="org-photo">
                    <p class="org-position">KEPALA DUSUN TIMBALA 2</p>
                    <p class="org-name">IQRAM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="org-card">
                    <img src="{{ asset('images/pak dusun lapri.jpg') }}" alt="Kepala Dusun Lapri" class="org-photo">
                    <p class="org-position">KEPALA DUSUN LAPRI</p>
                    <p class="org-name">YUSALFA</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="org-card">
                    <img src="{{ asset('images/pak dusun matirowalie.jpg') }}" alt="Kepala Dusun Mattirowalie" class="org-photo">
                    <p class="org-position">KEPALA DUSUN MATTIROWALIE</p>
                    <p class="org-name">JUSTANG</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Content Sections */
    .content-section {
        padding: 60px 0;
    }
    .section-title {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 30px;
        text-align: center;
        position: relative;
    }
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: var(--secondary-color);
    }
    /* Struktur Organisasi Cards */
    .org-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        height: 100%;
    }
    .org-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    .org-photo {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 15px;
        border: 3px solid var(--secondary-color);
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
    }
    .org-position {
        color: var(--text-light);
        font-size: 0.9rem;
        margin-bottom: 5px;
    }
    .org-name {
        color: var(--primary-color);
        font-size: 1.1rem;
        font-weight: 600;
    }
</style>
@endpush

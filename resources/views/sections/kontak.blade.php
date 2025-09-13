@extends('layouts.main')

@section('title', 'Kontak - Sistem Informasi Desa Timbala')

@section('content')
<!-- Kontak Section -->
<section class="content-section" id="kontak-section">
    <div class="container">
        <h2 class="section-title">Kontak Desa Timbala</h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="info-card">
                    <h4><i class="fas fa-map-marker-alt"></i> Alamat</h4>
                    <p>Kantor Desa Timbala<br>
                    Jl. poros kolaka-bombana, Dusun Timbala I<br>
                    Desa Timbala, Kecamatan Poleang Barat<br>
                    Kabupaten Bombana, Sulawesi Tenggara<br>
                    Kode Pos 93772</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-card">
                    <h4><i class="fas fa-phone"></i> Kontak</h4>
                    <p>Telepon: (0274) 123456<br>
                    Email: desatimbalabersatu77@gmail.com<br>
                    Website: www.desatimbala.bombana.com</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-card">
                    <h4><i class="fas fa-clock"></i> Jam Layanan</h4>
                    <p>Senin - Jumat: 08.00 - 15.00 WIB<br>
                    Sabtu: 08.00 - 11.00 WIB<br>
                    Minggu: Tutup</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-card">
                    <h4><i class="fas fa-map"></i> Peta Lokasi</h4>
                    <div class="map-container">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.1234567890!2d121.4761815!3d-4.6453071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbd37a7d90d6087%3A0x86f0f01cc1f27853!2sKantor%20Desa%20Timbala!5e0!3m2!1sid!2sid!4v1234567890!5m2!1sid!2sid" 
                            width="100%" 
                            height="200" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
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
    .info-card {
        background: white;
        border-radius: 10px;
        padding: 30px;
        margin-bottom: 20px;
        box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }
    .info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 25px rgba(0,0,0,0.12);
    }
    .info-card h4 {
        color: var(--primary-color);
        margin-bottom: 15px;
        font-size: 1.3rem;
    }
    .info-card p {
        color: var(--text-light);
        line-height: 1.6;
    }
    .info-card iframe {
        border-radius: 8px;
    }
    .map-container {
        margin-top: 10px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
</style>
@endpush

@extends('layouts.main')

@section('title', 'Beranda - Sistem Informasi Desa Timbala')

@section('content')
@include('sections.hero')
<!-- Village Head Section -->
<section class="village-head-section" id="home-section">
    <div class="container">
        <div class="row">
            <!-- News Card - Left Column -->
            <div class="col-lg-4 col-md-5 mb-4">
                <div class="news-card">
                    <div class="news-header">
                        <i class="fas fa-newspaper"></i>
                        <h3>Berita Desa</h3>
                    </div>
                    <div class="news-item">
                        <h4 class="news-title" onclick="window.open('https://bombanakab.go.id/berita/pembangunan-jalan-desa', '_blank')">Pembangunan Jalan Desa Tahap Dua Dimulai</h4>
                        <div class="news-meta">
                            <span><i class="far fa-calendar"></i> 15 November 2023</span>
                            <span class="news-source">Dinas PU</span>
                        </div>
                        <a href="https://bombanakab.go.id/berita/pembangunan-jalan-desa" target="_blank" class="news-link">
                            Baca selengkapnya <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                    <div class="news-item">
                        <h4 class="news-title" onclick="window.open('https://bombanakab.go.id/berita/pelatihan-umkm', '_blank')">Pelatihan Kewirausahaan untuk UMKM Desa Timbala</h4>
                        <div class="news-meta">
                            <span><i class="far fa-calendar"></i> 10 November 2023</span>
                            <span class="news-source">Diskop UKM</span>
                        </div>
                        <a href="https://bombanakab.go.id/berita/pelatihan-umkm" target="_blank" class="news-link">
                            Baca selengkapnya <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                    <div class="news-item">
                        <h4 class="news-title" onclick="window.open('https://bombanakab.go.id/berita/blt-dd', '_blank')">Penyaluran BLT-DD Tahap Akhir Tahun 2023</h4>
                        <div class="news-meta">
                            <span><i class="far fa-calendar"></i> 5 November 2023</span>
                            <span class="news-source">Desa Timbala</span>
                        </div>
                        <a href="https://bombanakab.go.id/berita/blt-dd" target="_blank" class="news-link">
                            Baca selengkapnya <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                    <div class="news-item">
                        <h4 class="news-title" onclick="window.open('https://bombanakab.go.id/berita/festival-jambu-mete', '_blank')">Festival Panen Jambu Mete Desa Timbala</h4>
                        <div class="news-meta">
                            <span><i class="far fa-calendar"></i> 1 November 2023</span>
                            <span class="news-source">Disparbud</span>
                        </div>
                        <a href="https://bombanakab.go.id/berita/festival-jambu-mete" target="_blank" class="news-link">
                            Baca selengkapnya <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Village Head Card - Middle Column -->
            <div class="col-lg-4 col-md-5 mb-4">
                <div class="village-head-card">
                    <img src="{{ asset('images/M. YASIR.jpg') }}" alt="Kepala Desa" class="head-photo">
                    <h2 class="head-name">M. YASIR, S.M</h2>
                    <p class="head-position">Kepala Desa Timbala</p>
                    <div class="welcome-message">
                        <p>Assalamualaikum Warahmatullahi Wabarakatuh,</p>
                        <p>Selamat datang di Sistem Informasi Desa Timbala. Sebagai Kepala Desa, saya mengucapkan terima kasih atas kunjungan Anda di website resmi desa kami. Website ini hadir sebagai wujud komitmen kami dalam mewujudkan transparansi dan pelayanan prima kepada seluruh masyarakat Desa Timbala.</p>
                        <p>Melalui platform ini, kami berharap dapat memberikan informasi yang akurat dan terkini seputar kegiatan desa, program pembangunan, serta berbagai layanan yang tersedia untuk masyarakat. Mari kita bersama-sama membangun Desa Timbala yang lebih baik, maju, dan sejahtera.</p>
                        <p>Wassalamualaikum Warahmatullahi Wabarakatuh.</p>
                    </div>
                </div>
            </div>
            
            <!-- Regent Card - Right Column -->
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="regent-card">
                    <div class="regent-header">
                        <h3>Pemerintah Kabupaten</h3>
                    </div>
                    <div class="regent-photos">
                        <div class="regent-item">
                            <div style="width: 100px; height: 100px; overflow: hidden; border-radius: 50%; margin: 0 auto; background: #97bc62; position: relative;">
                                <img src="{{ asset('images/Foto Bupati Bombana.png') }}" alt="Bupati Bombana" class="regent-photo" style="position: relative; top: 15px; width: 100%; height: auto;">
                            </div>
                            <h4 class="regent-name">Ir. H. BURHANUDDIN. M.Si</h4>
                            <p class="regent-position">Bupati Bombana</p>
                        </div>
                        <div class="regent-item">
                            <div style="width: 100px; height: 100px; overflow: hidden; border-radius: 50%; margin: 0 auto; background: #97bc62; position: relative;">
                                <img src="{{ asset('images/Wakil Bupati.png') }}" alt="Wakil Bupati Bombana" class="regent-photo" style="position: relative; top: 15px; width: 100%; height: auto;">
                            </div>
                            <h4 class="regent-name">AHMAD YANI, S.Pd., M.Pd</h4>
                            <p class="regent-position">Wakil Bupati Bombana</p>
                        </div>    
                        <div class="regent-item">
                            <div style="width: 100px; height: 100px; overflow: hidden; border-radius: 50%; margin: 0 auto; background: #97bc62; position: relative;">
                                <img src="{{ asset('images/Ibu Bupati.png') }}" alt="Wakil Bupati Bombana" class="regent-photo" style="position: relative; top: 15px; width: 100%; height: auto;">
                            </div>
                            <h4 class="regent-name">Hj.FATMAWATI KASIM MAREWA, S. Sos</h4>
                            <p class="regent-position">Ketua TP-PKK Kab. Bombana</p>
                        </div>
                        <div class="regent-item">
                            <img src="{{ asset('images/ibu kades.jpg') }}" alt="Wakil Bupati Bombana" class="regent-photo">
                            <h4 class="regent-name">Hj. FITRIAH YASIR</h4>
                            <p class="regent-position">Ketua TP-PKK Desa Timbala</p>          
                        </div>
                        a 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Village Head Section */
    .village-head-section {
        padding: 80px 0;
        background: linear-gradient(135deg, var(--bg-light) 0%, #f0f8f0 100%);
        margin-top: 0;
        position: relative;
    }
    
    .village-head-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color), var(--accent-color));
    }
    
    /* News Card Styles */
    .news-card {
        background: rgb(255, 255, 255);
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    .news-header {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        border-bottom: 2px solid var(--secondary-color);
        padding-bottom: 10px;
    }
    .news-header i {
        color: var(--primary-color);
        font-size: 1.5rem;
        margin-right: 10px;
    }
    .news-header h3 {
        color: var(--primary-color);
        margin: 0;
        font-size: 1.3rem;
    }
    .news-item {
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }
    .news-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    .news-title {
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 5px;
        font-size: 1rem;
        transition: color 0.3s ease;
        cursor: pointer;
    }
    .news-title:hover {
        color: var(--secondary-color);
    }
    .news-meta {
        display: flex;
        justify-content: space-between;
        font-size: 0.8rem;
        color: var(--text-light);
        margin-bottom: 8px;
    }
    .news-source {
        color: var(--accent-color);
        font-weight: 500;
    }
    .news-link {
        color: var(--primary-color);
        text-decoration: none;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
    }
    .news-link:hover {
        color: var(--secondary-color);
        transform: translateX(3px);
    }
    .news-link i {
        margin-left: 5px;
    }
    
    /* Regent Card Styles */
    .regent-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .regent-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    .regent-header {
        text-align: center;
        margin-bottom: 20px;
        width: 100%;
    }
    .regent-header h3 {
        color: var(--primary-color);
        margin: 0;
        font-size: 1.3rem;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--secondary-color);
    }
    .regent-photos {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
    }
    .regent-item {
        text-align: center;
    }
    .regent-photo {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 10px;
        border: 3px solid var(--secondary-color);
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
    }
    .regent-name {
        font-size: 1rem;
        color: var(--primary-color);
        margin-bottom: 5px;
        font-weight: 600;
    }
    .regent-position {
        font-size: 0.9rem;
        color: var(--text-light);
    }
    
    /* Village Head Card */
    .village-head-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .village-head-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    .head-photo {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 20px;
        border: 5px solid var(--secondary-color);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    .head-name {
        font-size: 1.5rem;
        color: var(--primary-color);
        margin-bottom: 10px;
        text-align: center;
    }
    .head-position {
        font-size: 1.1rem;
        color: var(--text-light);
        text-align: center;
        margin-bottom: 20px;
    }
    .welcome-message {
        font-size: 1rem;
        line-height: 1.6;
        color: var(--text-dark);
        text-align: justify;
        width: 100%;
    }
    
    @media (max-width: 768px) {
        .news-card, .regent-card, .village-head-card {
            margin-bottom: 20px;
        }
        .regent-photos {
            flex-direction: row;
            justify-content: space-around;
        }
    }
</style>
@endpush

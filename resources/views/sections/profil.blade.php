@extends('layouts.main')

@section('title', 'Profil Desa - Sistem Informasi Desa Timbala')

@section('content')
<!-- Profil Desa Section -->
<section class="content-section" id="profil-section">
    <div class="container">
        <h2 class="section-title">Profil Desa Timbala</h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="info-card">
                    <h4><i class="fas fa-map-marker-alt"></i> Letak Geografis</h4>
                    <p>Desa Timbala terletak di Kecamatan Poleang Barat, Kabupaten Bombana. Desa ini memiliki luas wilayah sebesar 12,25 Km dengan ketinggian ketinggian ± 10 dp] di atas permukaan laut. Batas-batas desa meliputi sebelah utara Desa Matabundu, sebelah selatan Desa Bulumanai, sebelah timur Desa Ranokomea, dan sebelah barat Teluk Bone.</p>
                    
                    <div class="map-container">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.1234567890!2d121.4761815!3d-4.6453071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbd37a7d90d6087%3A0x86f0f01cc1f27853!2sKantor%20Desa%20Timbala!5e0!3m2!1sid!2sid!4v1234567890!5m2!1sid!2sid" 
                            width="100%" 
                            height="400" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    
                    <div class="map-info">
                        <h5><i class="fas fa-info-circle"></i> Informasi Lokasi</h5>
                        <p><strong>Alamat:</strong> Jl. poros kolaka-bombana, Dusun Timbala I, Desa Timbala, Kecamatan Poleang Barat, Kabupaten Bombana, Sulawesi Tenggara, Kode Pos 93772</p>
                        <p><strong>Koordinat:</strong> -4.6453071, 121.4761815</p>
                        <p><strong>Buka di Google Maps:</strong> <a href="https://www.google.com/maps/place/Kantor+Desa+Timbala/@-4.6345927,121.4476467,13218m/data=!3m1!1e3!4m6!3m5!1s0x2dbd37a7d90d6087:0x86f0f01cc1f27853!8m2!3d-4.6381209!4d121.4796287!16s%2Fg%2F11f_p2r2_r!5m1!1e1?entry=ttu&g_ep=EgoyMDI1MDkwOS4wIKXMDSoASAFQAw%3D%3D" target="_blank">Klik di sini</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-card">
                    <h4><i class="fas fa-users"></i> Demografi</h4>
                    <p>Jumlah penduduk Desa Timbala saat ini adalah 1461 jiwa yang terdiri dari 764 laki-laki dan 705 perempuan. Mayoritas penduduk bekerja di sektor pertanian dan perikanan.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-card">
                    <h4><i class="fas fa-industry"></i> Potensi Desa</h4>
                    <p>Potensi di bidang pertanian dan perkebunan merupakan potensi unggulan yang terdapat di Desa Timbala. Komoditas jambu mete, jagung, singkong, Pisang, tanaman hortikultura sangat dominan didukung oleh lahan yang subur, iklim yang baik serta kemampuan petani dalam bidang pertanian yang memadai.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-card">
                    <h4><i class="fas fa-school"></i> Sarana dan Prasarana</h4>
                    <p>Desa Timbala dilengkapi dengan berbagai fasilitas umum antara lain 1 SD Negeri, 1 TK, 1 Puskesmas Pembantu, 1 posyandu, 2 masjid, balai desa, lapangan futsal, pondok pesantren, pasar serta jalan desa yang sudah beraspal sepanjang 10 km.</p>
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
    /* Map Container */
    .map-container {
        margin-top: 20px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 3px 15px rgba(0,0,0,0.1);
        height: 400px;
    }
    .map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
    .map-info {
        margin-top: 15px;
        padding: 15px;
        background: var(--bg-light);
        border-radius: 8px;
        font-size: 0.9rem;
        color: var(--text-light);
    }
    .map-info h5 {
        color: var(--primary-color);
        margin-bottom: 10px;
    }
    .map-info p {
        margin-bottom: 5px;
    }
    .map-info a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
    }
    .map-info a:hover {
        text-decoration: underline;
    }
</style>
@endpush

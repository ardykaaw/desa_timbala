@extends('layouts.main')

@section('title', 'Visi & Misi - Sistem Informasi Desa Timbala')

@section('content')
<!-- Visi Misi Section -->
<section class="content-section" id="visimisi-section">
    <div class="container">
        <h2 class="section-title">Visi & Misi</h2>
        <div class="info-card">
            <h4><i class="fas fa-eye"></i> Visi</h4>
            <p>"Terwujudnya Desa Timbala yang Maju, Mandiri, dan Sejahtera Berbasis Pertanian dan UMKM dengan Didukung Sumber Daya Manusia yang Berkualitas serta Lingkungan yang Lestari"</p>
        </div>
        <div class="info-card">
            <h4><i class="fas fa-bullseye"></i> Misi</h4>
            <ol>
                <li>Mewujudkan dan mengembangkan kegiatan keagamaan untuk menambah keimanan dan ketaqwaan kepada Tuhan Yang Maha Esa.</li>
                <li>Membangun dan meningkatkan hasil perikanan dan pertanian dengan jalan penataan pengairan, perbaikan jalan usaha tani, pola pemupukan, dan tanam yang baik, serta edukasi penangkapan ikan bagi nelayan</li>
                <li>Membangun sarana olahraga yang layak bagi masyarakat terutama Sepak Bola/Futsal</li>
                <li>Peningkatan sarana dan prasarana pelayanan dasar Desa </li>
                <li>Menata Pemerintahan Desa Timbala yang kompak dan bertanggung jawab dalam mengemban amanat masyarakat</li>
                <li>Meningkatkan pelayanan masyarakat secara terpadu dan optimal.
                <li>Menumbuh Kembangkan Kelompok Tani dan Gabungan Kelompok Tani serta bekerja sama denga HIPPA untuk memfasilitasi kebutuhan Petani</li>
                <li>Menumbuh kembangkan usaha kecil dan menengah.</li>
                <li>Membangun dan mendorong majunya bidang pendidikan baik formal maupun nonformal yang mudah diakses dan dinikmati seluruh warga masyarakat tanpa terkecuali yang mampu menghasilkan insan intelektual, inovatif dan relegi .</li>
                <li>Membangun dan mendorong usaha-usaha untuk pengembangan dan optimalisasi sektor perikanan, pertanian, peternakan, dan kewira usahaan</li>
                </li>
            </ol>
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
    .info-card ol {
        color: var(--text-light);
        line-height: 1.6;
        padding-left: 20px;
    }
    .info-card ol li {
        margin-bottom: 10px;
    }
</style>
@endpush

@extends('layouts.main')

@section('title', 'Sejarah Desa - Sistem Informasi Desa Timbala')

@section('content')
<!-- Sejarah Desa Section -->
<section class="content-section" id="sejarah-section">
    <div class="container">
        <h2 class="section-title">Sejarah Desa Timbala</h2>
        <div class="info-card">
            <h4>Asal Usul Desa</h4>
            <p>Desa Timbala yang Kita Kenal saat ini, dulunya merupakan suatu wilayah perkampungan Masyarakat Moronene yang berada dalam Wilayah Desa Toari Buton.
Perkampungan suku moronene sudah ada sejak zaman dahulu sebelum indonesia merdeka dengan kondisi tanah yang subur dan ditubuhi dengan hutan yang menghijau serta berada pada dataran rendah dan dekat dengan pantai sehingga hal ini membuat para pelaut bugis dari bone selalu singgah dan pada akhirnya menetap dan medirikan perkampungan peristiwa ini disebabkan karena pada saat itu kerajaan bone telah runtuh atau dikelnal dengan "Rumpa Bone" sehingga membuat penduduk setempat (moronene) tersingkir dan membuka lahan pertanian yang baru atau biasa pula hidup berpindah-pindah.
Dari tahun ketahun pemukiman yang dihuni oleh mayoritas suku bugis bone ini berkembang pesat sehingga dibagi menjadi 4 (empat) perkampungan yaitu:
    Elle buloe,
    Elle jatie,
    Kumbala,
    Bulu tababbangnge
.</p>
        </div>
        <div class="info-card">
            <h4>Pembentukan Desa</h4>
            <p>pada tahun 1977 pemerintah desa Timbala dimekarkan dari desa indik yaitu desa Toari, adapun nama desa Timbala yakni diambil dari kata Kumbala yang berarti nakal.</p>
        </div>
        <div class="info-card">
            <h4>Perkembangan Desa</h4>
            <p>Sejak berdirinya, Desa Timbala telah mengalami banyak perkembangan signifikan. Dari desa yang tadinya hanya mengandalkan pertanian tradisional, kini telah berkembang dengan adanya berbagai inovasi pertanian modern, perkembangan UMKM, serta peningkatan sumber daya manusia melalui berbagai program pendidikan dan pelatihan.</p>
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
</style>
@endpush

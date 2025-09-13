@extends('layouts.main')

@section('title', 'Wisata Desa - Sistem Informasi Desa Timbala')

@section('content')
<!-- Wisata Desa Section -->
<section class="content-section" id="wisata-section">
    <div class="container">
        <h2 class="section-title">PANTAI TANJUNG INDAH TIMBALA</h2>
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="wisata-card">
                    <img src="{{ asset('images/villa.jpg') }}" alt="Villa" class="wisata-image">
                    <div class="wisata-content">
                        <h3 class="wisata-title">Villa</h3>
                        <p class="wisata-description">Villa yang berada dipantai tanjung indah timbala yang terletak tepat di tepi laut, menghadirkan suasana tenang dengan panorama biru samudra yang luas. bangunan ini dirancang untuk memberikan kenyamanan maksimal bagi wisatawan yang berkunjung.</p>
                        <div class="wisata-info">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="wisata-card">
                    <img src="{{ asset('images/wc umum.jpg') }}" alt="WC Umum" class="wisata-image">
                    <div class="wisata-content">
                        <h3 class="wisata-title">WC Umum</h3>
                        <p class="wisata-description">WC umum diarea pantai berfungsi sebagai sarana sanitasi bagi pengunjung. fasilitas ini disediakan untuk mendukung kenyamanan wisatawan, menjaga kebersihan lingkungan serta mencegah terjadinya pencemaran pada pantai.</p>
                        <div class="wisata-info">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="wisata-card">
                    <img src="{{ asset('images/batu karang.jpeg') }}" alt="Batu Karang" class="wisata-image">
                    <div class="wisata-content">
                        <h3 class="wisata-title">Batu Karang</h3>
                        <p class="wisata-description">Batu karang di Pantai Tanjung Indah Timbala merupakan formasi geologis yang menakjubkan yang terbentuk dari proses alam selama ribuan tahun. Karang-karang ini menciptakan ekosistem bawah laut yang kaya dan beragam, menjadi habitat bagi berbagai jenis ikan tropis, koral, dan biota laut lainnya. Wisatawan dapat menikmati keindahan batu karang melalui aktivitas snorkeling atau diving untuk menyaksikan keanekaragaman hayati laut yang menawan. Formasi karang yang unik ini juga berfungsi sebagai pelindung alami pantai dari abrasi ombak, sekaligus menciptakan laguna-laguna kecil yang tenang dan aman untuk berenang. Pada saat air surut, beberapa bagian batu karang akan terlihat jelas dan dapat dijelajahi untuk melihat berbagai jenis kerang, siput laut, dan organisme intertidal lainnya. Keberadaan batu karang ini menjadikan Pantai Tanjung Indah sebagai destinasi yang sempurna untuk kegiatan ekowisata dan pendidikan lingkungan.</p>
                        <div class="wisata-info">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="wisata-card">
                    <img src="{{ asset('images/penyediaan tempat sampah.jpg') }}" alt="Tempat Sampah" class="wisata-image">
                    <div class="wisata-content">
                        <h3 class="wisata-title">Tempat Sampah</h3>
                        <p class="wisata-description">Penyediaan tempat sampah di pantai berguna untuk menjaga kebersihan, keindahan, dan kelestarian lingkungan. fasilitas ini membantu pengunjung membuang sampah pada tempatnya, sehingga pantai tetap nyaman dikunjungi dan bebas dari pencemaran.</p>
                        <div class="wisata-info">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="wisata-card">
                    <img src="{{ asset('images/gedung aula serba guna.jpg') }}" alt="Gedung Aula Serbaguna" class="wisata-image">
                    <div class="wisata-content">
                        <h3 class="wisata-title">Gedung Aula Serbaguna</h3>
                        <p class="wisata-description">Gedung aula serbaguna yang berada diarea pantai tanjung indah timbala merupakan fasilitas pendukung pariwisata dan kegiatan masyarakat. bangunan ini berfungsi sebagai tempat berkumpul, mengadakan acara, maupun pusat kegiatan yang dapat dimanfaatkan oleh wisatawan, peengelola, maupun warga setempat.</p>
                        <div class="wisata-info">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="wisata-card">
                    <img src="{{ asset('images/pantai.jpeg') }}" alt="Pantai Tanjung Indah" class="wisata-image">
                    <div class="wisata-content">
                        <h3 class="wisata-title">Pantai Tanjung Indah</h3>
                        <p class="wisata-description">Pantai Tanjung Indah Timbala merupakan destinasi wisata unggulan yang menawarkan keindahan alam yang memukau dengan hamparan pasir putih yang lembut dan air laut yang jernih berwarna biru tosca. Pantai ini dikelilingi oleh formasi batu karang yang menakjubkan dan pepohonan kelapa yang rindang, menciptakan suasana tropis yang sangat menenangkan. Wisatawan dapat menikmati berbagai aktivitas menarik seperti berenang, snorkeling untuk melihat keindahan terumbu karang, memancing, atau sekadar bersantai sambil menikmati pemandangan sunset yang spektakuler. Pantai ini juga dilengkapi dengan berbagai fasilitas pendukung seperti area parkir yang luas, toilet umum, tempat sampah, dan bale-bale untuk bersantai. Keberadaan pantai ini tidak hanya menjadi daya tarik wisatawan lokal dan mancanegara, tetapi juga menjadi sumber penghasilan bagi masyarakat sekitar melalui berbagai usaha kuliner dan jasa wisata. Dengan pemandangan yang memukau dan udara yang segar, Pantai Tanjung Indah Timbala menjadi tempat yang sempurna untuk melepas penat dan menikmati keindahan alam Indonesia yang luar biasa.</p>
                        <div class="wisata-info">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Wisata Cards */
    .wisata-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        height: 100%;
    }
    .wisata-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    .wisata-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .wisata-content {
        padding: 20px;
    }
    .wisata-title {
        color: var(--primary-color);
        font-size: 1.3rem;
        margin-bottom: 10px;
    }
    .wisata-description {
        color: var(--text-light);
        line-height: 1.6;
        margin-bottom: 15px;
    }
    .wisata-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.9rem;
        color: var(--text-light);
    }
</style>
@endpush

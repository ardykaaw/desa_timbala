<!-- Logo Corner -->
<div class="logo-corner">
    <div class="logo-item">
        <img src="{{ asset('images/logo 1.png') }}" alt="Logo Desa Timbala">
        <div class="logo-label">Desa Timbala</div>
    </div>
    <div class="logo-item">
        <img src="{{ asset('images/l 2.png') }}" alt="Logo Kabupaten Bombana">
        <div class="logo-label">KabupatenBombana</div>
    </div>
    <div class="logo-item">
        <img src="{{ asset('images/l 3.png') }}" alt="Logo BUMDes">
        <div class="logo-label">Kemendes</div>
    </div>
</div>

<!-- Menu Toggle Button -->
<button class="menu-toggle" onclick="toggleMenu()">
    <i class="fas fa-bars"></i>
</button>

<!-- Sidebar Menu -->
<nav class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h3><i class="fas fa-landmark"></i> Desa Timbala</h3>
    </div>
    <div class="sidebar-menu">
        <a href="{{ route('home') }}" class="menu-item">
            <i class="fas fa-home"></i> Beranda
        </a>
        <a href="{{ route('profil') }}" class="menu-item">
            <i class="fas fa-info-circle"></i> Profil Desa
        </a>
        <a href="{{ route('sejarah') }}" class="menu-item">
            <i class="fas fa-history"></i> Sejarah Desa
        </a>
        <a href="{{ route('wisata') }}" class="menu-item">
            <i class="fas fa-camera"></i> Wisata Desa
        </a>
        <a href="{{ route('publikasi') }}" class="menu-item">
            <i class="fas fa-newspaper"></i> Publikasi
        </a>
        <a href="{{ route('visimisi') }}" class="menu-item">
            <i class="fas fa-bullseye"></i> Visi & Misi
        </a>
        <a href="{{ route('struktur') }}" class="menu-item">
            <i class="fas fa-sitemap"></i> Struktur Organisasi
        </a>
        <a href="{{ route('layanan') }}" class="menu-item">
            <i class="fas fa-concierge-bell"></i> Layanan Desa
        </a>
        <a href="{{ route('kontak') }}" class="menu-item">
            <i class="fas fa-phone"></i> Kontak
        </a>
    </div>
    <a href="/login" class="menu-item admin-login" onclick="console.log('Login button clicked')">
        <i class="fas fa-user-shield"></i> Login Admin
    </a>
</nav>

<!-- Overlay -->
<div class="overlay" id="overlay" onclick="toggleMenu()"></div>


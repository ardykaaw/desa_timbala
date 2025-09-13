<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title">DESA TIMBALA</h1>
        <p class="hero-subtitle">Timbala Bersatu</p>
    </div>
</section>

<style>
    /* Hero Section */
    .hero-section {
        position: relative;
        height: 90vh;
        min-height: 400px;
        background: url('{{ asset("images/pantai 5.jpg") }}') center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.5));
    }
    .hero-content {
        position: relative;
        z-index: 1;
        text-align: center;
        color: white;
    }
    .hero-title {
        font-size: 3.5rem;
        font-weight: bold;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        animation: fadeInUp 1s ease;
    }
    .hero-subtitle {
        font-size: 1.5rem;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        animation: fadeInUp 1s ease 0.2s;
        animation-fill-mode: both;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        .hero-subtitle {
            font-size: 1.2rem;
        }
    }
</style>

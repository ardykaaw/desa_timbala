<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dokumen Desa Timbala')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/icons-sprite.svg" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            color: #333;
        }
        
        .document-header {
            background: linear-gradient(135deg, #2c5f2d 0%, #97bc62 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 20px 20px;
        }
        
        .document-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .document-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .document-content {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .document-footer {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            color: #6c757d;
        }
        
        .download-btn {
            background: linear-gradient(135deg, #2c5f2d, #97bc62);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(44, 95, 45, 0.3);
            color: white;
        }
        
        .file-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .file-icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            margin-right: 1rem;
        }
        
        .file-icon.document { background: linear-gradient(135deg, #dc3545, #fd7e14); }
        .file-icon.video { background: linear-gradient(135deg, #0d6efd, #6610f2); }
        .file-icon.audio { background: linear-gradient(135deg, #198754, #20c997); }
        .file-icon.image { background: linear-gradient(135deg, #ffc107, #fd7e14); }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #2c5f2d;
        }
        
        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .back-btn {
            background: #6c757d;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .back-btn:hover {
            background: #5a6268;
            color: white;
            transform: translateY(-2px);
        }
        
        @media print {
            .no-print { display: none !important; }
            .document-content { box-shadow: none; }
            .document-footer { background: white; }
        }
    </style>
</head>
<body>
    <!-- Document Header -->
    <div class="document-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="document-title">
                        <i class="fas fa-file-alt me-3"></i>
                        @yield('title', 'Dokumen Desa Timbala')
                    </h1>
                    <p class="document-subtitle">
                        <i class="fas fa-building me-2"></i>
                        Desa Timbala - Kecamatan Timbala
                    </p>
                </div>
                <div class="col-md-4 text-end">
                    <img src="{{ asset('images/logo 1.png') }}" alt="Logo Desa Timbala" style="height: 80px; opacity: 0.9;">
                </div>
            </div>
        </div>
    </div>

    <!-- Document Content -->
    <div class="container">
        <div class="document-content">
            @yield('content')
        </div>
        
        <!-- Document Footer -->
        <div class="document-footer">
            <div class="row align-items-center">
                <div class="col-md-6 text-start">
                    <p class="mb-0">
                        <i class="fas fa-calendar me-2"></i>
                        Diunduh pada: {{ date('d F Y, H:i') }}
                    </p>
                </div>
                <div class="col-md-6 text-end">
                    <p class="mb-0">
                        <i class="fas fa-globe me-2"></i>
                        www.desatimbala.go.id
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>

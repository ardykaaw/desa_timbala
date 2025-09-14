<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Layanan Baru</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .email-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .content {
            padding: 30px;
        }
        .service-info {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 8px 8px 0;
        }
        .service-info h3 {
            margin: 0 0 15px 0;
            color: #667eea;
            font-size: 20px;
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
            align-items: center;
        }
        .info-label {
            font-weight: 600;
            min-width: 120px;
            color: #555;
        }
        .info-value {
            flex: 1;
            color: #333;
        }
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .badge-online {
            background: #d4edda;
            color: #155724;
        }
        .badge-offline {
            background: #fff3cd;
            color: #856404;
        }
        .action-buttons {
            text-align: center;
            margin: 30px 0;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin: 0 10px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #5a6fd8;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
        .footer p {
            margin: 5px 0;
        }
        .timestamp {
            color: #888;
            font-size: 12px;
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>🔔 Notifikasi Layanan Baru</h1>
            <p>Ada layanan baru yang ditambahkan ke sistem</p>
        </div>
        
        <div class="content">
            <h2>Halo Admin!</h2>
            <p>Layanan baru telah ditambahkan ke sistem Desa Timbala. Berikut detail layanan tersebut:</p>
            
            <div class="service-info">
                <h3>{{ $service->name }}</h3>
                
                <div class="info-row">
                    <span class="info-label">Kategori:</span>
                    <span class="info-value">{{ $service->category }}</span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Jenis:</span>
                    <span class="info-value">
                        <span class="badge {{ $service->type === 'online' ? 'badge-online' : 'badge-offline' }}">
                            {{ $service->type === 'online' ? 'Online' : 'Offline' }}
                        </span>
                    </span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Deskripsi:</span>
                    <span class="info-value">{{ $service->description }}</span>
                </div>
                
                @if($service->requirements)
                <div class="info-row">
                    <span class="info-label">Persyaratan:</span>
                    <span class="info-value">{{ $service->requirements }}</span>
                </div>
                @endif
                
                @if($service->procedures)
                <div class="info-row">
                    <span class="info-label">Prosedur:</span>
                    <span class="info-value">{{ $service->procedures }}</span>
                </div>
                @endif
                
                <div class="info-row">
                    <span class="info-label">Lama Proses:</span>
                    <span class="info-value">{{ $service->processing_days }} hari</span>
                </div>
                
                @if($service->fee)
                <div class="info-row">
                    <span class="info-label">Biaya:</span>
                    <span class="info-value">Rp {{ number_format($service->fee, 0, ',', '.') }}</span>
                </div>
                @endif
                
                <div class="info-row">
                    <span class="info-label">Status:</span>
                    <span class="info-value">
                        <span class="badge {{ $service->is_active ? 'badge-online' : 'badge-offline' }}">
                            {{ $service->is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </span>
                </div>
            </div>
            
            <div class="action-buttons">
                <a href="{{ url('/admin/layanan') }}" class="btn">Kelola Layanan</a>
                <a href="{{ url('/admin') }}" class="btn">Dashboard Admin</a>
            </div>
            
            <div class="timestamp">
                Dikirim pada: {{ now()->format('d F Y, H:i:s') }}
            </div>
        </div>
        
        <div class="footer">
            <p><strong>Desa Timbala</strong></p>
            <p>Sistem Informasi Desa</p>
            <p>Email ini dikirim otomatis oleh sistem</p>
        </div>
    </div>
</body>
</html>

@extends('layouts.document')

@section('title', $publication->title . ' - Desa Timbala')

@section('content')
<div class="row">
    <div class="col-md-8">
        <!-- File Information -->
        <div class="file-info">
            <div class="d-flex align-items-center">
                <div class="file-icon {{ $publication->type }}">
                    <i class="{{ $publication->type_icon }}"></i>
                </div>
                <div class="flex-grow-1">
                    <h4 class="mb-1">{{ $publication->title }}</h4>
                    <p class="text-muted mb-2">{{ $publication->description }}</p>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary me-2">{{ ucfirst($publication->type) }}</span>
                        <span class="badge bg-secondary me-2">{{ ucfirst($publication->category ?? 'Umum') }}</span>
                        <span class="badge {{ $publication->is_active ? 'bg-success' : 'bg-warning' }}">
                            {{ $publication->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- File Details -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h5><i class="fas fa-info-circle me-2"></i>Informasi File</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <strong>Nama File:</strong> {{ $publication->file_name }}
                    </li>
                    <li class="mb-2">
                        <strong>Ukuran File:</strong> {{ $publication->file_size_formatted }}
                    </li>
                    <li class="mb-2">
                        <strong>Format:</strong> {{ strtoupper($publication->file_extension) }}
                    </li>
                    <li class="mb-2">
                        <strong>Tanggal Upload:</strong> {{ $publication->created_at->format('d F Y, H:i') }}
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <h5><i class="fas fa-chart-bar me-2"></i>Statistik</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <strong>Total Download:</strong> {{ number_format($publication->downloads) }} kali
                    </li>
                    <li class="mb-2">
                        <strong>Penulis:</strong> {{ $publication->author ?? 'Tidak diketahui' }}
                    </li>
                    <li class="mb-2">
                        <strong>Tanggal Publikasi:</strong> 
                        {{ $publication->published_date ? \Carbon\Carbon::parse($publication->published_date)->format('d F Y') : 'Tidak ditentukan' }}
                    </li>
                    <li class="mb-2">
                        <strong>Status:</strong> 
                        <span class="badge {{ $publication->is_active ? 'bg-success' : 'bg-warning' }}">
                            {{ $publication->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Download Section -->
        <div class="text-center mb-4">
            <a href="{{ route('admin.publications.download', $publication->id) }}" class="download-btn btn-lg">
                <i class="fas fa-download me-2"></i>
                Download {{ $publication->title }}
            </a>
        </div>

        <!-- Description -->
        @if($publication->description)
        <div class="mb-4">
            <h5><i class="fas fa-align-left me-2"></i>Deskripsi</h5>
            <p class="text-muted">{{ $publication->description }}</p>
        </div>
        @endif

        <!-- Back Button -->
        <div class="text-center no-print">
            <a href="{{ url()->previous() }}" class="back-btn">
                <i class="fas fa-arrow-left me-2"></i>
                Kembali
            </a>
        </div>
    </div>
    
    <div class="col-md-4">
        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">{{ number_format($publication->downloads) }}</div>
                <div class="stat-label">Total Download</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $publication->file_size_formatted }}</div>
                <div class="stat-label">Ukuran File</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ strtoupper($publication->file_extension) }}</div>
                <div class="stat-label">Format File</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $publication->created_at->diffForHumans() }}</div>
                <div class="stat-label">Waktu Upload</div>
            </div>
        </div>

        <!-- Related Information -->
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">
                    <i class="fas fa-info-circle me-2"></i>
                    Informasi Tambahan
                </h6>
            </div>
            <div class="card-body">
                <p class="text-muted small">
                    <i class="fas fa-shield-alt me-2"></i>
                    File ini telah diverifikasi dan aman untuk diunduh.
                </p>
                <p class="text-muted small">
                    <i class="fas fa-copyright me-2"></i>
                    Hak cipta dilindungi oleh Desa Timbala.
                </p>
                <p class="text-muted small">
                    <i class="fas fa-download me-2"></i>
                    Download akan dimulai secara otomatis.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto download after 3 seconds
    setTimeout(function() {
        const downloadBtn = document.querySelector('.download-btn');
        if (downloadBtn) {
            downloadBtn.click();
        }
    }, 3000);
    
    // Track download
    const downloadUrl = '{{ route("admin.publications.download", $publication->id) }}';
    const trackUrl = '{{ route("admin.publications.track-download", $publication->id) }}';
    
    // Track download when page loads
    fetch(trackUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log('Download tracked:', data);
    })
    .catch(error => {
        console.error('Error tracking download:', error);
    });
});
</script>
@endpush

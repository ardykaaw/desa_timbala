@extends('layouts.main')

@section('title', 'Publikasi - Sistem Informasi Desa Timbala')

@section('content')
<!-- Publikasi Section -->
<section class="content-section" id="publikasi-section">
    <div class="container">
        <h2 class="section-title">Publikasi Desa</h2>
        
        <!-- Tab Navigation -->
        <div class="publikasi-tabs">
            <div class="publikasi-tab active" onclick="showPublikasi('apbdes')">APBDES</div>
            <div class="publikasi-tab" onclick="showPublikasi('rpjmdes')">RPJMDES</div>
            <div class="publikasi-tab" onclick="showPublikasi('rkpdes')">RKPDES</div>
            <div class="publikasi-tab" onclick="showPublikasi('add')">Alokasi Dana Desa</div>
            <div class="publikasi-tab" onclick="showPublikasi('dds')">Dana Desa</div>
            <div class="publikasi-tab" onclick="showPublikasi('produk-hukum')">Produk Hukum</div>
            <div class="publikasi-tab" onclick="showPublikasi('sk-kepala-desa')">SK Kepala Desa</div>
        </div>
        
        <!-- Dynamic Content -->
        <div id="all-content" class="publikasi-content active">
            @forelse($publications as $publication)
            <div class="publikasi-item">
                <div class="publikasi-header">
                    <h3 class="publikasi-title">{{ $publication->title }}</h3>
                    <span class="publikasi-year">{{ $publication->published_date ? $publication->published_date->format('Y') : $publication->created_at->format('Y') }}</span>
                </div>
                <div class="publikasi-info">
                    <i class="fas fa-calendar"></i> {{ $publication->published_date ? $publication->published_date->format('d F Y') : $publication->created_at->format('d F Y') }} | 
                    <i class="{{ $publication->type_icon }}"></i> {{ ucfirst($publication->type) }} | 
                    <i class="fas fa-download"></i> {{ $publication->file_size_formatted ?? 'N/A' }}
                    @if($publication->category)
                    | <i class="fas fa-tag"></i> {{ ucfirst($publication->category) }}
                    @endif
                </div>
                @if($publication->description)
                <div class="publikasi-description">
                    {{ $publication->description }}
                </div>
                @endif
                <div class="publikasi-actions">
                    <a href="{{ route('publication.download', $publication->id) }}" class="btn-download" target="_blank">
                        <i class="fas fa-download"></i> Download
                    </a>
                    <button class="btn-view" onclick="viewPublication({{ $publication->id }})">
                        <i class="fas fa-eye"></i> Lihat Detail
                    </button>
                </div>
            </div>
            @empty
            <div class="publikasi-item">
                <div class="text-center py-4">
                    <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada publikasi</h5>
                    <p class="text-muted">Publikasi akan ditampilkan di sini setelah ditambahkan oleh admin</p>
                </div>
            </div>
            @endforelse
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
    
    /* Publikasi Styles */
    .publikasi-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 30px;
        justify-content: center;
    }
    .publikasi-tab {
        background: white;
        border: 2px solid var(--secondary-color);
        color: var(--primary-color);
        padding: 10px 20px;
        border-radius: 25px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
    }
    .publikasi-tab:hover {
        background: var(--secondary-color);
        color: white;
        transform: translateY(-2px);
    }
    .publikasi-tab.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }
    .publikasi-content {
        display: none;
    }
    .publikasi-content.active {
        display: block;
        animation: fadeInUp 0.5s ease;
    }
    .publikasi-item {
        background: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border-left: 4px solid var(--secondary-color);
        transition: all 0.3s ease;
    }
    .publikasi-item:hover {
        transform: translateX(5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .publikasi-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    .publikasi-title {
        color: var(--primary-color);
        font-size: 1.2rem;
        font-weight: 600;
        margin: 0;
    }
    .publikasi-year {
        background: var(--accent-color);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }
    .publikasi-info {
        color: var(--text-light);
        font-size: 0.9rem;
        margin-bottom: 10px;
    }
    .publikasi-description {
        color: var(--text-dark);
        line-height: 1.6;
        margin-bottom: 15px;
    }
    .publikasi-actions {
        display: flex;
        gap: 10px;
    }
    .btn-download {
        background: var(--secondary-color);
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 5px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    .btn-download:hover {
        background: var(--primary-color);
        transform: translateY(-2px);
    }
    .btn-view {
        background: transparent;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
        padding: 8px 20px;
        border-radius: 5px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    .btn-view:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
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
        .publikasi-tabs {
            justify-content: flex-start;
            overflow-x: auto;
            padding-bottom: 10px;
        }
        .publikasi-tab {
            white-space: nowrap;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Show publikasi content
    function showPublikasi(type) {
        // Hide all publikasi content
        const contents = document.querySelectorAll('.publikasi-content');
        contents.forEach(content => {
            content.classList.remove('active');
        });
        // Remove active class from all tabs
        const tabs = document.querySelectorAll('.publikasi-tab');
        tabs.forEach(tab => {
            tab.classList.remove('active');
        });
        // Show selected content
        const targetContent = document.getElementById(type + '-content');
        if (targetContent) {
            targetContent.classList.add('active');
        } else {
            // Show all content if specific content not found
            document.getElementById('all-content').classList.add('active');
        }
        // Add active class to clicked tab
        event.target.classList.add('active');
    }

    // View publication function
    function viewPublication(id) {
        // Create modal for viewing publication details
        const modal = document.createElement('div');
        modal.className = 'modal fade';
        modal.id = 'publication-modal';
        modal.innerHTML = `
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Publikasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="publication-detail-content">
                        <div class="text-center py-4">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2">Memuat detail publikasi...</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        const bsModal = new bootstrap.Modal(modal);
        bsModal.show();
        
        // Load publication details
        fetch(`/publikasi/${id}/detail`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                const publication = data.publication;
                const content = `
                    <div class="row">
                        <div class="col-md-8">
                            <h4>${publication.title}</h4>
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge ${publication.type === 'dokumen' ? 'bg-danger' : (publication.type === 'video' ? 'bg-primary' : (publication.type === 'audio' ? 'bg-success' : 'bg-warning'))} text-light me-2">${publication.type}</span>
                                <span class="badge bg-info text-light me-2">${publication.category || 'Umum'}</span>
                            </div>
                            ${publication.description ? `<p>${publication.description}</p>` : ''}
                            <div class="mt-3">
                                <button class="btn btn-primary" onclick="downloadPublication(${publication.id})">
                                    <i class="fas fa-download me-2"></i>Download File
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h6>Informasi File</h6>
                            <table class="table table-sm">
                                <tr><td><strong>Nama File:</strong></td><td>${publication.file_name || '-'}</td></tr>
                                <tr><td><strong>Ukuran:</strong></td><td>${publication.file_size_formatted || '-'}</td></tr>
                                <tr><td><strong>Tipe:</strong></td><td>${publication.file_type || '-'}</td></tr>
                                <tr><td><strong>Download:</strong></td><td>${publication.downloads} kali</td></tr>
                                <tr><td><strong>Penulis:</strong></td><td>${publication.author || '-'}</td></tr>
                                <tr><td><strong>Dibuat:</strong></td><td>${new Date(publication.created_at).toLocaleDateString('id-ID')}</td></tr>
                                ${publication.published_date ? `<tr><td><strong>Dipublikasikan:</strong></td><td>${new Date(publication.published_date).toLocaleDateString('id-ID')}</td></tr>` : ''}
                            </table>
                        </div>
                    </div>
                `;
                document.getElementById('publication-detail-content').innerHTML = content;
            } else {
                document.getElementById('publication-detail-content').innerHTML = `
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Gagal memuat detail publikasi
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('publication-detail-content').innerHTML = `
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Terjadi kesalahan saat memuat detail publikasi
                </div>
            `;
        });
        
        // Remove modal when hidden
        modal.addEventListener('hidden.bs.modal', function() {
            document.body.removeChild(modal);
        });
    }

    // Download publication function
    function downloadPublication(id) {
        console.log('Download publication called with ID:', id);
        
        // Show loading state
        showAlert('info', 'Memulai download...');
        
        // Create a temporary link to trigger download
        const link = document.createElement('a');
        link.href = `/publikasi/${id}/download`;
        link.download = '';
        link.target = '_blank';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        
        // Show success message
        setTimeout(() => {
            showAlert('success', 'Download berhasil dimulai!');
        }, 1000);
    }

    // Show alert function
    function showAlert(type, message) {
        const alertDiv = document.createElement('div');
        let alertClass = 'alert-success';
        
        switch(type) {
            case 'error':
                alertClass = 'alert-danger';
                break;
            case 'info':
                alertClass = 'alert-info';
                break;
            case 'warning':
                alertClass = 'alert-warning';
                break;
            default:
                alertClass = 'alert-success';
        }
        
        alertDiv.className = `alert ${alertClass} alert-dismissible fade show`;
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        
        // Insert at the top of the page
        const container = document.querySelector('.container') || document.body;
        if (container) {
            container.insertBefore(alertDiv, container.firstChild);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                if (alertDiv.parentNode) {
                    alertDiv.remove();
                }
            }, 5000);
        }
    }
</script>
@endpush

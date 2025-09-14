// Admin Publikasi JavaScript
document.addEventListener('DOMContentLoaded', function() {
    console.log('Admin Publikasi JS loaded');
    
    // Get base URLs
    const API_BASE_URL = window.API_BASE_URL || '';
    const ADMIN_BASE_URL = window.ADMIN_BASE_URL || '';
    
    console.log('API_BASE_URL:', API_BASE_URL);
    console.log('ADMIN_BASE_URL:', ADMIN_BASE_URL);

    // Handle form submission for add publication
    const publicationForm = document.getElementById('publication-form');
    if (publicationForm) {
        publicationForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Publication form submitted');
            
            const formData = new FormData(this);
            const submitBtn = document.querySelector('button[form="publication-form"]');
            
            if (!submitBtn) {
                console.error('Submit button not found for publication form');
                showAlert('error', 'Error: Submit button not found');
                return;
            }
            
            const originalText = submitBtn.innerHTML;
            
            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
            submitBtn.disabled = true;
            
            // Submit form
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Response:', data);
                if (data.success) {
                    // Close modal
                    const modalElement = document.getElementById('modal-tambah-publikasi');
                    if (modalElement) {
                        const modal = bootstrap.Modal.getInstance(modalElement);
                        if (modal) {
                            modal.hide();
                        }
                    }
                    
                    // Reset form
                    this.reset();
                    
                    // Reload page
                    window.location.reload();
                } else {
                    showAlert('error', data.message || 'Terjadi kesalahan saat menyimpan publikasi');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('error', 'Terjadi kesalahan saat menyimpan publikasi');
            })
            .finally(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
    }
});

// View publication function
function viewPublication(id) {
    const API_BASE_URL = window.API_BASE_URL || '';
    console.log('Viewing publication ID:', id);
    
    fetch(`${API_BASE_URL}/admin/publications/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const modalContent = document.getElementById('modal-detail-content');
                if (modalContent) {
                    modalContent.innerHTML = `
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="avatar avatar-xl mb-3" style="background: linear-gradient(135deg, #2c5f2d, #97bc62);">
                                        <i class="${data.publication.type_icon} text-white" style="font-size: 2rem;"></i>
                                    </div>
                                    <h4>${data.publication.title}</h4>
                                    <span class="badge ${data.publication.type === 'dokumen' ? 'bg-red' : (data.publication.type === 'video' ? 'bg-blue' : (data.publication.type === 'audio' ? 'bg-green' : 'bg-yellow'))} text-light">
                                        ${data.publication.type.charAt(0).toUpperCase() + data.publication.type.slice(1)}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <h6>Deskripsi:</h6>
                                    <p>${data.publication.description || 'Tidak ada deskripsi'}</p>
                                </div>
                                <div class="mb-3">
                                    <h6>Informasi File:</h6>
                                    <ul class="list-unstyled">
                                        <li><strong>Nama File:</strong> ${data.publication.file_name}</li>
                                        <li><strong>Ukuran:</strong> ${data.publication.file_size_formatted}</li>
                                        <li><strong>Download:</strong> ${data.publication.downloads} kali</li>
                                        <li><strong>Tanggal Upload:</strong> ${data.publication.created_at}</li>
                                        <li><strong>Status:</strong> 
                                            <span class="badge ${data.publication.is_active ? 'bg-green' : 'bg-yellow'} text-light">
                                                ${data.publication.is_active ? 'Aktif' : 'Nonaktif'}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mb-3">
                                    <h6>Kategori:</h6>
                                    <span class="badge bg-blue text-light">${data.publication.category || 'Umum'}</span>
                                </div>
                            </div>
                        </div>
                    `;
                }
                
                // Show modal
                const modal = new bootstrap.Modal(document.getElementById('modal-detail'));
                modal.show();
            } else {
                showAlert('error', 'Gagal memuat detail publikasi');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat memuat detail publikasi');
        });
}

// Download publication function
function downloadPublication(id) {
    const API_BASE_URL = window.API_BASE_URL || '';
    console.log('Downloading publication ID:', id);
    
    // Show loading
    showAlert('info', 'Memulai download...');
    
    // Create download link
    const downloadUrl = `${API_BASE_URL}/admin/publications/${id}/download`;
    
    // Create temporary link and click it
    const link = document.createElement('a');
    link.href = downloadUrl;
    link.download = '';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    
    // Track download
    fetch(`${API_BASE_URL}/admin/publications/${id}/track-download`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Download tracked successfully');
        }
    })
    .catch(error => {
        console.error('Error tracking download:', error);
    });
}

// Edit publication function
function editPublication(id) {
    const API_BASE_URL = window.API_BASE_URL || '';
    console.log('Editing publication ID:', id);
    
    fetch(`${API_BASE_URL}/admin/publications/${id}/edit`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Populate edit form
                const editForm = document.getElementById('edit-publication-form');
                if (editForm) {
                    editForm.querySelector('input[name="title"]').value = data.publication.title;
                    editForm.querySelector('select[name="type"]').value = data.publication.type;
                    editForm.querySelector('textarea[name="description"]').value = data.publication.description || '';
                    editForm.querySelector('select[name="category"]').value = data.publication.category || '';
                    editForm.querySelector('input[name="author"]').value = data.publication.author || '';
                    editForm.querySelector('input[name="published_date"]').value = data.publication.published_date || '';
                    editForm.action = `${API_BASE_URL}/admin/publications/${id}`;
                    
                    // Add method override for PUT
                    let methodInput = editForm.querySelector('input[name="_method"]');
                    if (!methodInput) {
                        methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = '_method';
                        editForm.appendChild(methodInput);
                    }
                    methodInput.value = 'PUT';
                }
                
                // Show edit modal
                const modal = new bootstrap.Modal(document.getElementById('modal-edit-publication'));
                modal.show();
            } else {
                showAlert('error', 'Gagal memuat data publikasi');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat memuat data publikasi');
        });
}

// Delete publication function
function deletePublication(id) {
    if (confirm('Apakah Anda yakin ingin menghapus publikasi ini? Tindakan ini tidak dapat dibatalkan.')) {
        const API_BASE_URL = window.API_BASE_URL || '';
        console.log('Deleting publication ID:', id);
        
        fetch(`${API_BASE_URL}/admin/publications/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.reload();
            } else {
                showAlert('error', data.message || 'Gagal menghapus publikasi');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat menghapus publikasi');
        });
    }
}

// Show alert function
function showAlert(type, message) {
    // Remove existing alerts
    const existingAlerts = document.querySelectorAll('.alert-custom');
    existingAlerts.forEach(alert => alert.remove());
    
    // Create alert element
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type === 'success' ? 'success' : type === 'info' ? 'info' : 'danger'} alert-dismissible fade show alert-custom`;
    alertDiv.style.position = 'fixed';
    alertDiv.style.top = '20px';
    alertDiv.style.right = '20px';
    alertDiv.style.zIndex = '9999';
    alertDiv.style.minWidth = '300px';
    
    alertDiv.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'info' ? 'info-circle' : 'exclamation-circle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    
    // Add to body
    document.body.appendChild(alertDiv);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (alertDiv.parentNode) {
            alertDiv.remove();
        }
    }, 5000);
}
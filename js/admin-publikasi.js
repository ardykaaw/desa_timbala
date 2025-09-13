// Admin Publikasi JavaScript Functions

// Initialize tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Form submission for publications
const publicationForm = document.getElementById('publication-form');
if (publicationForm) {
    publicationForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
        submitBtn.disabled = true;
        
        // Determine if it's create or update
        const isUpdate = this.method === 'PUT';
        const url = this.action;
        
        // Submit form
        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(response => {
            console.log('Response status:', response.status);
            if (!response.ok) {
                return response.text().then(text => {
                    console.log('Error response:', text);
                    throw new Error(`HTTP ${response.status}: ${text}`);
                });
            }
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            if (data.success) {
                // Show success message
                showAlert('success', data.message);
                
                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('modal-tambah-publikasi'));
                if (modal) {
                    modal.hide();
                }
                
                // Reload page to show new data
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showAlert('error', data.message || 'Terjadi kesalahan saat menyimpan publikasi');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat menyimpan publikasi: ' + error.message);
        })
        .finally(() => {
            // Reset button state
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        });
    });
}

// Reset form when modal is hidden
const modalTambahPublikasi = document.getElementById('modal-tambah-publikasi');
if (modalTambahPublikasi) {
    modalTambahPublikasi.addEventListener('hidden.bs.modal', function () {
        // Reset form
        const form = document.getElementById('publication-form');
        if (form) {
            form.reset();
            
            // Reset form action to create
            form.action = '/admin/publications';
            form.method = 'POST';
            
            // Remove method override
            const methodInput = form.querySelector('input[name="_method"]');
            if (methodInput) {
                methodInput.remove();
            }
            
            // Reset file input
            const fileInput = form.querySelector('input[name="file"]');
            if (fileInput) {
                fileInput.value = '';
                fileInput.required = true;
                fileInput.nextElementSibling.innerHTML = '<small class="text-muted">Maksimal 10MB</small>';
            }
            
            // Reset modal title
            const modalTitle = document.querySelector('#modal-tambah-publikasi .modal-title');
            if (modalTitle) {
                modalTitle.innerHTML = '<i class="fas fa-plus me-2"></i>Tambah Publikasi Baru';
            }
            
            // Clear validation errors
            document.querySelectorAll('.is-invalid').forEach(el => {
                el.classList.remove('is-invalid');
            });
            document.querySelectorAll('.invalid-feedback').forEach(el => {
                el.remove();
            });
        }
    });
}

// Search functionality
const searchInput = document.querySelector('input[placeholder="Cari publikasi..."]');
if (searchInput) {
    searchInput.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const tableRows = document.querySelectorAll('tbody tr');
        
        tableRows.forEach(row => {
            const title = row.querySelector('.font-weight-medium');
            if (title && title.textContent.toLowerCase().includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
}

// Filter functionality
const filterButton = document.querySelector('button[class*="btn-primary"]');
if (filterButton) {
    filterButton.addEventListener('click', function() {
        const typeFilter = document.querySelector('select').value;
        const categoryFilter = document.querySelectorAll('select')[1].value;
        const tableRows = document.querySelectorAll('tbody tr');
        
        tableRows.forEach(row => {
            let showRow = true;
            
            if (typeFilter) {
                const type = row.querySelector('.badge');
                if (type && !type.textContent.toLowerCase().includes(typeFilter)) {
                    showRow = false;
                }
            }
            
            if (categoryFilter) {
                const badges = row.querySelectorAll('.badge');
                if (badges.length > 1 && !badges[1].textContent.toLowerCase().includes(categoryFilter)) {
                    showRow = false;
                }
            }
            
            row.style.display = showRow ? '' : 'none';
        });
    });
}

// Delete publication
function deletePublication(id) {
    console.log('Delete publication called with ID:', id);
    
    if (confirm('Apakah Anda yakin ingin menghapus publikasi ini? Tindakan ini tidak dapat dibatalkan.')) {
        // Show loading state
        showAlert('info', 'Menghapus publikasi...');
        
        fetch(`/admin/publications/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(response => {
            console.log('Delete response status:', response.status);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Delete response data:', data);
            if (data.success) {
                showAlert('success', data.message);
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showAlert('error', data.message || 'Gagal menghapus publikasi');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat menghapus publikasi: ' + error.message);
        });
    }
}

// Edit publication function
function editPublication(id) {
    console.log('Edit publication called with ID:', id);
    
    // Load publication data via AJAX
    fetch(`/admin/publications/${id}`)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            const publication = data.publication;
            
            // Populate form with publication data
            document.querySelector('#publication-form input[name="title"]').value = publication.title;
            document.querySelector('#publication-form textarea[name="description"]').value = publication.description || '';
            document.querySelector('#publication-form select[name="type"]').value = publication.type;
            document.querySelector('#publication-form select[name="category"]').value = publication.category || '';
            document.querySelector('#publication-form input[name="author"]').value = publication.author || '';
            document.querySelector('#publication-form input[name="published_date"]').value = publication.published_date || '';
            
            // Change form action to update
            document.getElementById('publication-form').action = `/admin/publications/${id}`;
            document.getElementById('publication-form').method = 'POST';
            
            // Add hidden input for method override
            let methodInput = document.getElementById('publication-form').querySelector('input[name="_method"]');
            if (!methodInput) {
                methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'PUT';
                document.getElementById('publication-form').appendChild(methodInput);
            } else {
                methodInput.value = 'PUT';
            }
            
            // Change modal title
            document.querySelector('#modal-tambah-publikasi .modal-title').innerHTML = '<i class="fas fa-edit me-2"></i>Edit Publikasi';
            
            // Make file input not required for edit
            const fileInput = document.querySelector('#publication-form input[name="file"]');
            if (fileInput) {
                fileInput.required = false;
                fileInput.nextElementSibling.innerHTML = '<small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>';
            }
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('modal-tambah-publikasi'));
            modal.show();
        } else {
            showAlert('error', 'Gagal memuat data publikasi');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('error', 'Terjadi kesalahan saat memuat data publikasi: ' + error.message);
    });
}

// View publication function
function viewPublication(id) {
    console.log('View publication called with ID:', id);
    
    // Load publication data via AJAX
    fetch(`/admin/publications/${id}`)
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
                            <span class="badge ${publication.type === 'dokumen' ? 'bg-red' : (publication.type === 'video' ? 'bg-blue' : (publication.type === 'audio' ? 'bg-green' : 'bg-yellow'))} text-light me-2">${publication.type}</span>
                            <span class="badge bg-blue text-light me-2">${publication.category || 'Umum'}</span>
                            <span class="badge ${publication.is_active ? 'bg-green' : 'bg-yellow'} text-light">${publication.is_active ? 'Aktif' : 'Nonaktif'}</span>
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
            
            // Show modal with publication details
            document.getElementById('modal-detail-content').innerHTML = content;
            document.querySelector('#modal-detail .modal-title').innerHTML = 'Detail Publikasi';
            const modal = new bootstrap.Modal(document.getElementById('modal-detail'));
            modal.show();
        } else {
            showAlert('error', 'Gagal memuat data publikasi');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('error', 'Terjadi kesalahan saat memuat data publikasi: ' + error.message);
    });
}

// Download publication function
function downloadPublication(id) {
    console.log('Download publication called with ID:', id);
    
    // Show loading state
    showAlert('info', 'Memulai download...');
    
    // Create a temporary link to trigger download
    const link = document.createElement('a');
    link.href = `/admin/publications/${id}/download`;
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
    const container = document.querySelector('.page-wrapper') || document.querySelector('.container-xl') || document.body;
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

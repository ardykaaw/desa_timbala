// Admin Berita JavaScript - Simple Version
document.addEventListener('DOMContentLoaded', function() {
    console.log('Admin Berita JS loaded');
    
    // Get base URLs
    const API_BASE_URL = window.API_BASE_URL || '';
    const ADMIN_BASE_URL = window.ADMIN_BASE_URL || '';
    
    console.log('API_BASE_URL:', API_BASE_URL);
    console.log('ADMIN_BASE_URL:', ADMIN_BASE_URL);

    // Handle form submission for both add and edit
    function handleFormSubmission(formId, action) {
        const form = document.getElementById(formId);
        if (!form) {
            console.error('Form not found:', formId);
            return;
        }

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Form submitted:', formId);
            
            const formData = new FormData(this);
            const submitBtn = document.querySelector(`button[form="${formId}"]`);
            
            if (!submitBtn) {
                console.error('Submit button not found for form:', formId);
                alert('Error: Submit button not found');
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
                    const modalElement = document.getElementById(`modal-${action}-berita`);
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
                    showAlert('error', data.message || 'Terjadi kesalahan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('error', 'Terjadi kesalahan saat menyimpan');
            })
            .finally(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
    }

    // Initialize forms
    handleFormSubmission('news-form', 'tambah');
    handleFormSubmission('edit-news-form', 'edit');
});

// View news function
function viewNews(id) {
    const API_BASE_URL = window.API_BASE_URL || '';
    console.log('Viewing news ID:', id);
    
    fetch(`${API_BASE_URL}/admin/news/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const modalContent = document.getElementById('modal-detail-content');
                if (modalContent) {
                    modalContent.innerHTML = `
                        <div class="row">
                            <div class="col-md-4">
                                ${data.news.featured_image ? 
                                    `<img src="${API_BASE_URL}/storage/${data.news.featured_image}" class="img-fluid rounded" alt="${data.news.title}">` : 
                                    '<div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 200px;"><i class="fas fa-image fa-3x text-muted"></i></div>'
                                }
                            </div>
                            <div class="col-md-8">
                                <h4>${data.news.title}</h4>
                                <p class="text-muted">
                                    <i class="fas fa-user me-1"></i> ${data.news.author} | 
                                    <i class="fas fa-calendar me-1"></i> ${data.news.formatted_published_at || 'Belum dipublikasikan'} | 
                                    <i class="fas fa-eye me-1"></i> ${data.news.views} views
                                </p>
                                <span class="badge bg-blue text-light">${data.news.category}</span>
                                <span class="badge ${data.news.status === 'published' ? 'bg-green' : 'bg-yellow'} text-light ms-2">
                                    ${data.news.status === 'published' ? 'Diterbitkan' : 'Draft'}
                                </span>
                                <hr>
                                <div class="mt-3">
                                    <h6>Ringkasan:</h6>
                                    <p>${data.news.excerpt || 'Tidak ada ringkasan'}</p>
                                </div>
                                <div class="mt-3">
                                    <h6>Konten:</h6>
                                    <div class="content-preview">${data.news.content}</div>
                                </div>
                            </div>
                        </div>
                    `;
                }
                
                // Show modal
                const modal = new bootstrap.Modal(document.getElementById('modal-detail'));
                modal.show();
            } else {
                showAlert('error', 'Gagal memuat detail berita');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat memuat detail berita');
        });
}

// Edit news function
function editNews(id) {
    const API_BASE_URL = window.API_BASE_URL || '';
    console.log('Editing news ID:', id);
    
    fetch(`${API_BASE_URL}/admin/news/${id}/edit`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Populate edit form
                const editForm = document.getElementById('edit-news-form');
                if (editForm) {
                    editForm.querySelector('input[name="title"]').value = data.news.title;
                    editForm.querySelector('select[name="category"]').value = data.news.category;
                    editForm.querySelector('textarea[name="excerpt"]').value = data.news.excerpt || '';
                    editForm.querySelector('textarea[name="content"]').value = data.news.content;
                    editForm.querySelector('select[name="status"]').value = data.news.status;
                    editForm.action = `${API_BASE_URL}/admin/news/${id}`;
                    
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
                const modal = new bootstrap.Modal(document.getElementById('modal-edit-berita'));
                modal.show();
            } else {
                showAlert('error', 'Gagal memuat data berita');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat memuat data berita');
        });
}

// Toggle status function
function toggleStatus(id) {
    if (confirm('Apakah Anda yakin ingin mengubah status berita ini?')) {
        const API_BASE_URL = window.API_BASE_URL || '';
        console.log('Toggling status for news ID:', id);
        
        fetch(`${API_BASE_URL}/admin/news/${id}/toggle-status`, {
            method: 'POST',
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
                showAlert('error', data.message || 'Gagal mengubah status berita');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat mengubah status berita');
        });
    }
}

// Delete news function
function deleteNews(id) {
    if (confirm('Apakah Anda yakin ingin menghapus berita ini? Tindakan ini tidak dapat dibatalkan.')) {
        const API_BASE_URL = window.API_BASE_URL || '';
        console.log('Deleting news ID:', id);
        
        fetch(`${API_BASE_URL}/admin/news/${id}`, {
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
                showAlert('error', data.message || 'Gagal menghapus berita');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat menghapus berita');
        });
    }
}

// Show alert function (only for errors)
function showAlert(type, message) {
    if (type === 'success') return;
    
    // Remove existing alerts
    const existingAlerts = document.querySelectorAll('.alert-custom');
    existingAlerts.forEach(alert => alert.remove());
    
    // Create alert element
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-danger alert-dismissible fade show alert-custom`;
    alertDiv.style.position = 'fixed';
    alertDiv.style.top = '20px';
    alertDiv.style.right = '20px';
    alertDiv.style.zIndex = '9999';
    alertDiv.style.minWidth = '300px';
    
    alertDiv.innerHTML = `
        <i class="fas fa-exclamation-circle me-2"></i>
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

// Filter function
function filterNews() {
    const searchTerm = document.querySelector('input[placeholder="Cari berita..."]').value;
    const statusFilter = document.querySelector('select').value;
    const categoryFilter = document.querySelectorAll('select')[1].value;
    
    console.log('Filtering:', { searchTerm, statusFilter, categoryFilter });
}

// Export functions
function exportToExcel() {
    const API_BASE_URL = window.API_BASE_URL || '';
    window.location.href = `${API_BASE_URL}/admin/berita/export/excel`;
}

function exportToPDF() {
    const API_BASE_URL = window.API_BASE_URL || '';
    window.location.href = `${API_BASE_URL}/admin/berita/export/pdf`;
}

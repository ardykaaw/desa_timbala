// Admin Berita JavaScript Functions

// Initialize tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Form submission for news
const newsForm = document.getElementById('news-form');
if (newsForm) {
    newsForm.addEventListener('submit', function(e) {
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
            method: isUpdate ? 'PUT' : 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Show success message
                showAlert('success', data.message);
                
                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('modal-tambah-berita'));
                modal.hide();
                
                // Reload page to show new data
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showAlert('error', data.message || 'Terjadi kesalahan saat menyimpan berita');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat menyimpan berita: ' + error.message);
        })
        .finally(() => {
            // Reset button state
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        });
    });
}

// Reset form when modal is hidden
const modalTambahBerita = document.getElementById('modal-tambah-berita');
if (modalTambahBerita) {
    modalTambahBerita.addEventListener('hidden.bs.modal', function () {
        // Reset form
        const form = document.getElementById('news-form');
        if (form) {
            form.reset();
            
            // Reset form action to create
            form.action = '/admin/news';
            form.method = 'POST';
            
            // Remove method override
            const methodInput = form.querySelector('input[name="_method"]');
            if (methodInput) {
                methodInput.remove();
            }
            
            // Reset modal title
            const modalTitle = document.querySelector('#modal-tambah-berita .modal-title');
            if (modalTitle) {
                modalTitle.innerHTML = '<i class="fas fa-plus me-2"></i>Tambah Berita Baru';
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
const searchInput = document.querySelector('input[placeholder="Cari berita..."]');
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
        const statusFilter = document.querySelector('select').value;
        const categoryFilter = document.querySelectorAll('select')[1].value;
        const tableRows = document.querySelectorAll('tbody tr');
        
        tableRows.forEach(row => {
            let showRow = true;
            
            if (statusFilter) {
                const status = row.querySelector('.badge');
                if (status && !status.textContent.toLowerCase().includes(statusFilter)) {
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

// Toggle news status
function toggleStatus(id) {
    console.log('Toggle status called with ID:', id);
    
    if (confirm('Apakah Anda yakin ingin mengubah status berita ini?')) {
        // Show loading state
        showAlert('info', 'Mengubah status berita...');
        
        fetch(`/admin/news/${id}/toggle-status`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            console.log('Toggle status response:', response.status);
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Toggle status data:', data);
            if (data.success) {
                showAlert('success', data.message);
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showAlert('error', data.message || 'Gagal mengubah status berita');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat mengubah status berita: ' + error.message);
        });
    }
}

// Delete news
function deleteNews(id) {
    console.log('Delete news called with ID:', id);
    
    if (confirm('Apakah Anda yakin ingin menghapus berita ini? Tindakan ini tidak dapat dibatalkan.')) {
        // Show loading state
        showAlert('info', 'Menghapus berita...');
        
        fetch(`/admin/news/${id}`, {
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
                showAlert('error', data.message || 'Gagal menghapus berita');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat menghapus berita: ' + error.message);
        });
    }
}

// Edit news function
function editNews(id) {
    console.log('Edit news called with ID:', id);
    
    // Load news data via AJAX
    fetch(`/admin/news/${id}`)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            const news = data.news;
            
            // Populate form with news data
            document.querySelector('#news-form input[name="title"]').value = news.title;
            document.querySelector('#news-form select[name="category"]').value = news.category;
            document.querySelector('#news-form textarea[name="excerpt"]').value = news.excerpt || '';
            document.querySelector('#news-form textarea[name="content"]').value = news.content;
            document.querySelector('#news-form select[name="status"]').value = news.status;
            
            // Change form action to update
            document.getElementById('news-form').action = `/admin/news/${id}`;
            document.getElementById('news-form').method = 'PUT';
            
            // Add hidden input for method override
            let methodInput = document.getElementById('news-form').querySelector('input[name="_method"]');
            if (!methodInput) {
                methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'PUT';
                document.getElementById('news-form').appendChild(methodInput);
            } else {
                methodInput.value = 'PUT';
            }
            
            // Change modal title
            document.querySelector('#modal-tambah-berita .modal-title').innerHTML = '<i class="fas fa-edit me-2"></i>Edit Berita';
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('modal-tambah-berita'));
            modal.show();
        } else {
            showAlert('error', 'Gagal memuat data berita');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('error', 'Terjadi kesalahan saat memuat data berita: ' + error.message);
    });
}

// View news function
function viewNews(id) {
    console.log('View news called with ID:', id);
    
    // Load news data via AJAX
    fetch(`/admin/news/${id}`)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            const news = data.news;
            const content = `
                <div class="row">
                    <div class="col-md-8">
                        <h4>${news.title}</h4>
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-blue text-light me-2">${news.category}</span>
                            <span class="badge ${news.status === 'published' ? 'bg-green' : 'bg-yellow'} text-light me-2">${news.status === 'published' ? 'Diterbitkan' : 'Draft'}</span>
                            <small class="text-muted">${news.views} views</small>
                        </div>
                        ${news.featured_image ? `<img src="/storage/${news.featured_image}" class="img-fluid rounded mb-3" alt="${news.title}">` : ''}
                        <div class="content">
                            ${news.content.replace(/\n/g, '<br>')}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h6>Informasi Berita</h6>
                        <table class="table table-sm">
                            <tr><td><strong>Penulis:</strong></td><td>${news.author}</td></tr>
                            <tr><td><strong>Kategori:</strong></td><td>${news.category}</td></tr>
                            <tr><td><strong>Status:</strong></td><td><span class="badge ${news.status === 'published' ? 'bg-green' : 'bg-yellow'} text-light">${news.status === 'published' ? 'Diterbitkan' : 'Draft'}</span></td></tr>
                            <tr><td><strong>Views:</strong></td><td>${news.views}</td></tr>
                            <tr><td><strong>Dibuat:</strong></td><td>${new Date(news.created_at).toLocaleDateString('id-ID')}</td></tr>
                            ${news.published_at ? `<tr><td><strong>Dipublikasikan:</strong></td><td>${new Date(news.published_at).toLocaleDateString('id-ID')}</td></tr>` : ''}
                        </table>
                        ${news.excerpt ? `<h6>Ringkasan</h6><p>${news.excerpt}</p>` : ''}
                    </div>
                </div>
            `;
            
            // Show modal with news details
            document.getElementById('modal-detail-content').innerHTML = content;
            document.querySelector('#modal-detail .modal-title').innerHTML = 'Detail Berita';
            const modal = new bootstrap.Modal(document.getElementById('modal-detail'));
            modal.show();
        } else {
            showAlert('error', 'Gagal memuat data berita');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('error', 'Terjadi kesalahan saat memuat data berita: ' + error.message);
    });
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
    const container = document.querySelector('.page-wrapper');
    if (container) {
        container.insertBefore(alertDiv, container.firstChild);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }
}

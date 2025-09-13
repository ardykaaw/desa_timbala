// Admin Layanan JavaScript Functions

// Initialize tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Reset form when modal is hidden
const modalTambahLayanan = document.getElementById('modal-tambah-layanan');
if (modalTambahLayanan) {
    modalTambahLayanan.addEventListener('hidden.bs.modal', function () {
        // Reset form
        const form = document.getElementById('form-tambah-layanan');
        if (form) {
            form.reset();
            
            // Reset form action to create
            form.action = '/admin/services';
            form.method = 'POST';
            
            // Remove method override
            const methodInput = form.querySelector('input[name="_method"]');
            if (methodInput) {
                methodInput.remove();
            }
            
            // Reset modal title
            const modalTitle = document.querySelector('#modal-tambah-layanan .modal-title');
            if (modalTitle) {
                modalTitle.innerHTML = '<i class="fas fa-plus me-2"></i>Tambah Layanan Baru';
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
const searchInput = document.querySelector('input[placeholder="Cari layanan..."]');
if (searchInput) {
    searchInput.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const serviceCards = document.querySelectorAll('.service-card');
        
        serviceCards.forEach(card => {
            const title = card.querySelector('h4').textContent.toLowerCase();
            if (title.includes(searchTerm)) {
                card.closest('.col-md-6').style.display = '';
            } else {
                card.closest('.col-md-6').style.display = 'none';
            }
        });
    });
}

// Filter functionality
const filterButton = document.querySelector('button[class*="btn-primary"]');
if (filterButton) {
    filterButton.addEventListener('click', function() {
        const categoryFilter = document.querySelector('select').value;
        const statusFilter = document.querySelectorAll('select')[1].value;
        const serviceCards = document.querySelectorAll('.service-card');
        
        serviceCards.forEach(card => {
            let showCard = true;
            
            if (categoryFilter) {
                // This would need to be implemented based on data attributes
                // For now, just show all cards
            }
            
            if (statusFilter) {
                const status = card.querySelector('.badge').textContent.toLowerCase();
                if (!status.includes(statusFilter)) {
                    showCard = false;
                }
            }
            
            card.closest('.col-md-6').style.display = showCard ? '' : 'none';
        });
    });
}

// Form submission for services
const formTambahLayanan = document.getElementById('form-tambah-layanan');
if (formTambahLayanan) {
    formTambahLayanan.addEventListener('submit', function(e) {
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
                const modal = bootstrap.Modal.getInstance(document.getElementById('modal-tambah-layanan'));
                modal.hide();
                
                // Reload page to show new data
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showAlert('error', data.message || 'Terjadi kesalahan saat menyimpan layanan');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat menyimpan layanan: ' + error.message);
        })
        .finally(() => {
            // Reset button state
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        });
    });
}

// Update status form submission
const formUpdateStatus = document.getElementById('form-update-status');
if (formUpdateStatus) {
    formUpdateStatus.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const requestId = formData.get('request_id');
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengupdate...';
        submitBtn.disabled = true;
        
        // Submit form
        fetch(`/admin/service-requests/${requestId}/update-status`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showAlert('success', data.message);
                
                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('modal-status'));
                modal.hide();
                
                // Reload page to show updated data
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showAlert('error', data.message || 'Terjadi kesalahan saat mengupdate status');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat mengupdate status');
        })
        .finally(() => {
            // Reset button state
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        });
    });
}

// View request function
function viewRequest(id) {
    console.log('View request called with ID:', id);
    
    // Show loading state
    document.getElementById('modal-detail-content').innerHTML = `
        <div class="text-center py-4">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2">Memuat detail pengajuan...</p>
        </div>
    `;
    
    // Show modal first
    const modal = new bootstrap.Modal(document.getElementById('modal-detail'));
    modal.show();
    
    // Load request details via AJAX
    fetch(`/admin/service-requests/${id}`)
    .then(response => {
        console.log('Response status:', response.status);
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Response data:', data);
        if (data.success) {
            const request = data.request;
            const content = `
                <div class="row">
                    <div class="col-md-6">
                        <h6>Informasi Pengajuan</h6>
                        <table class="table table-sm">
                            <tr><td><strong>No. Pengajuan:</strong></td><td>${request.request_number}</td></tr>
                            <tr><td><strong>Layanan:</strong></td><td>${request.service.name}</td></tr>
                            <tr><td><strong>Status:</strong></td><td><span class="badge ${request.status_badge} text-light">${request.status_text}</span></td></tr>
                            <tr><td><strong>Tanggal:</strong></td><td>${new Date(request.created_at).toLocaleDateString('id-ID')}</td></tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Data Pemohon</h6>
                        <table class="table table-sm">
                            <tr><td><strong>Nama:</strong></td><td>${request.full_name}</td></tr>
                            <tr><td><strong>NIK:</strong></td><td>${request.nik}</td></tr>
                            <tr><td><strong>Tempat/Tgl Lahir:</strong></td><td>${request.birth_place}, ${new Date(request.birth_date).toLocaleDateString('id-ID')}</td></tr>
                            <tr><td><strong>Jenis Kelamin:</strong></td><td>${request.gender}</td></tr>
                            <tr><td><strong>Alamat:</strong></td><td>${request.address}</td></tr>
                            <tr><td><strong>Telepon:</strong></td><td>${request.phone}</td></tr>
                            <tr><td><strong>Email:</strong></td><td>${request.email || '-'}</td></tr>
                        </table>
                    </div>
                </div>
                ${request.additional_info ? `<div class="mt-3"><h6>Keterangan Tambahan</h6><p>${request.additional_info}</p></div>` : ''}
                ${request.admin_notes ? `<div class="mt-3"><h6>Catatan Admin</h6><p>${request.admin_notes}</p></div>` : ''}
            `;
            
            document.getElementById('modal-detail-content').innerHTML = content;
        } else {
            document.getElementById('modal-detail-content').innerHTML = `
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Gagal memuat detail pengajuan: ${data.message || 'Terjadi kesalahan'}
                </div>
            `;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('modal-detail-content').innerHTML = `
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Terjadi kesalahan saat memuat detail pengajuan: ${error.message}
            </div>
        `;
    });
}

// Update status function
function updateStatus(id) {
    console.log('Update status called with ID:', id);
    
    // Set request ID
    document.getElementById('request_id').value = id;
    
    // Reset form
    document.getElementById('form-update-status').reset();
    document.getElementById('request_id').value = id;
    
    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('modal-status'));
    modal.show();
}

// Edit service function
function editService(id) {
    console.log('Edit service called with ID:', id);
    
    // Load service data via AJAX
    fetch(`/admin/services/${id}`)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            const service = data.service;
            
            // Populate form with service data
            document.querySelector('#form-tambah-layanan input[name="name"]').value = service.name;
            document.querySelector('#form-tambah-layanan select[name="category"]').value = service.category;
            document.querySelector('#form-tambah-layanan textarea[name="description"]').value = service.description;
            document.querySelector('#form-tambah-layanan select[name="type"]').value = service.type;
            document.querySelector('#form-tambah-layanan select[name="icon"]').value = service.icon || 'id-card';
            document.querySelector('#form-tambah-layanan input[name="processing_days"]').value = service.processing_days || 3;
            document.querySelector('#form-tambah-layanan input[name="fee"]').value = service.fee || 0;
            document.querySelector('#form-tambah-layanan textarea[name="requirements"]').value = service.requirements || '';
            document.querySelector('#form-tambah-layanan textarea[name="procedures"]').value = service.procedures || '';
            
            // Change form action to update
            document.getElementById('form-tambah-layanan').action = `/admin/services/${id}`;
            document.getElementById('form-tambah-layanan').method = 'PUT';
            
            // Add hidden input for method override
            let methodInput = document.getElementById('form-tambah-layanan').querySelector('input[name="_method"]');
            if (!methodInput) {
                methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'PUT';
                document.getElementById('form-tambah-layanan').appendChild(methodInput);
            } else {
                methodInput.value = 'PUT';
            }
            
            // Change modal title
            document.querySelector('#modal-tambah-layanan .modal-title').innerHTML = '<i class="fas fa-edit me-2"></i>Edit Layanan';
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('modal-tambah-layanan'));
            modal.show();
        } else {
            showAlert('error', 'Gagal memuat data layanan');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('error', 'Terjadi kesalahan saat memuat data layanan: ' + error.message);
    });
}

// Delete service function
function deleteService(id) {
    console.log('Delete service called with ID:', id);
    
    if (confirm('Apakah Anda yakin ingin menghapus layanan ini? Tindakan ini tidak dapat dibatalkan.')) {
        // Show loading state
        showAlert('info', 'Menghapus layanan...');
        
        fetch(`/admin/services/${id}`, {
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
                showAlert('error', data.message || 'Gagal menghapus layanan');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat menghapus layanan: ' + error.message);
        });
    }
}

// View service function
function viewService(id) {
    console.log('View service called with ID:', id);
    
    // Load service data via AJAX
    fetch(`/admin/services/${id}`)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            const service = data.service;
            const content = `
                <div class="row">
                    <div class="col-md-6">
                        <h6>Informasi Layanan</h6>
                        <table class="table table-sm">
                            <tr><td><strong>Nama:</strong></td><td>${service.name}</td></tr>
                            <tr><td><strong>Kategori:</strong></td><td>${service.category}</td></tr>
                            <tr><td><strong>Tipe:</strong></td><td><span class="badge ${service.type === 'online' ? 'bg-green' : 'bg-yellow'} text-light">${service.type}</span></td></tr>
                            <tr><td><strong>Hari Proses:</strong></td><td>${service.processing_days} hari</td></tr>
                            <tr><td><strong>Biaya:</strong></td><td>Rp ${service.fee ? service.fee.toLocaleString('id-ID') : '0'}</td></tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Deskripsi</h6>
                        <p>${service.description}</p>
                        ${service.requirements ? `<h6>Persyaratan</h6><p>${service.requirements}</p>` : ''}
                        ${service.procedures ? `<h6>Prosedur</h6><p>${service.procedures}</p>` : ''}
                    </div>
                </div>
            `;
            
            // Show modal with service details
            document.getElementById('modal-detail-content').innerHTML = content;
            document.querySelector('#modal-detail .modal-title').innerHTML = 'Detail Layanan';
            const modal = new bootstrap.Modal(document.getElementById('modal-detail'));
            modal.show();
        } else {
            showAlert('error', 'Gagal memuat data layanan');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('error', 'Terjadi kesalahan saat memuat data layanan: ' + error.message);
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

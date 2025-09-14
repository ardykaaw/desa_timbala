// Admin Layanan JavaScript
document.addEventListener('DOMContentLoaded', function() {
    console.log('Admin Layanan JS loaded');
    
    // Get base URLs
    const API_BASE_URL = window.API_BASE_URL || '';
    const ADMIN_BASE_URL = window.ADMIN_BASE_URL || '';
    
    console.log('API_BASE_URL:', API_BASE_URL);
    console.log('ADMIN_BASE_URL:', ADMIN_BASE_URL);

    // Check for error message
    const errorMessage = document.querySelector('.alert-danger');
    if (errorMessage) {
        console.error('Error detected:', errorMessage.textContent);
        showAlert('error', 'Terjadi kesalahan saat memuat data layanan');
    }

    // Handle form submission for add service
    const serviceForm = document.getElementById('form-tambah-layanan');
    if (serviceForm) {
        serviceForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Service form submitted');
            
            const formData = new FormData(this);
            const submitBtn = document.querySelector('button[form="form-tambah-layanan"]');
            
            if (!submitBtn) {
                console.error('Submit button not found for service form');
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
                    const modalElement = document.getElementById('modal-tambah-layanan');
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
                    showAlert('error', data.message || 'Terjadi kesalahan saat menyimpan layanan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('error', 'Terjadi kesalahan saat menyimpan layanan');
            })
            .finally(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
    }

    // Handle form submission for edit service
    const editServiceForm = document.getElementById('edit-service-form');
    if (editServiceForm) {
        editServiceForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Edit service form submitted');
            
            const formData = new FormData(this);
            const submitBtn = document.querySelector('button[form="edit-service-form"]');
            
            if (!submitBtn) {
                console.error('Submit button not found for edit service form');
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
                    const modalElement = document.getElementById('modal-edit-service');
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
                    showAlert('error', data.message || 'Terjadi kesalahan saat menyimpan perubahan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('error', 'Terjadi kesalahan saat menyimpan perubahan');
            })
            .finally(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
    }

    // Handle form submission for update status
    const statusForm = document.getElementById('form-update-status');
    if (statusForm) {
        statusForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Status form submitted');
            
            const formData = new FormData(this);
            const requestId = document.getElementById('request_id').value;
            const submitBtn = this.querySelector('button[type="submit"]');
            
            const originalText = submitBtn.innerHTML;
            
            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengupdate...';
            submitBtn.disabled = true;
            
            // Submit form
            fetch(`${API_BASE_URL}/admin/service-requests/${requestId}/update-status`, {
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
                    const modalElement = document.getElementById('modal-status');
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
                    showAlert('error', data.message || 'Terjadi kesalahan saat mengupdate status');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('error', 'Terjadi kesalahan saat mengupdate status');
            })
            .finally(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
    }
});

// View service function
function viewService(id) {
    const API_BASE_URL = window.API_BASE_URL || '';
    console.log('Viewing service ID:', id);
    
    fetch(`${API_BASE_URL}/admin/services/${id}`)
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
                                        <i class="fas fa-${data.service.icon || 'cog'} text-white" style="font-size: 2rem;"></i>
                                    </div>
                                    <h4>${data.service.name}</h4>
                                    <span class="badge ${data.service.type === 'online' ? 'bg-green' : 'bg-yellow'} text-light">
                                        ${data.service.type.charAt(0).toUpperCase() + data.service.type.slice(1)}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <h6>Deskripsi:</h6>
                                    <p>${data.service.description}</p>
                                </div>
                                <div class="mb-3">
                                    <h6>Informasi Layanan:</h6>
                                    <ul class="list-unstyled">
                                        <li><strong>Kategori:</strong> ${data.service.category}</li>
                                        <li><strong>Hari Proses:</strong> ${data.service.processing_days} hari</li>
                                        <li><strong>Biaya:</strong> Rp ${data.service.fee ? data.service.fee.toLocaleString() : '0'}</li>
                                        <li><strong>Status:</strong> 
                                            <span class="badge ${data.service.is_active ? 'bg-success' : 'bg-warning'} text-light">
                                                ${data.service.is_active ? 'Aktif' : 'Nonaktif'}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                ${data.service.requirements ? `
                                <div class="mb-3">
                                    <h6>Persyaratan:</h6>
                                    <p>${data.service.requirements}</p>
                                </div>
                                ` : ''}
                                ${data.service.procedures ? `
                                <div class="mb-3">
                                    <h6>Prosedur:</h6>
                                    <p>${data.service.procedures}</p>
                                </div>
                                ` : ''}
                            </div>
                        </div>
                    `;
                }
                
                // Show modal
                const modal = new bootstrap.Modal(document.getElementById('modal-detail'));
                modal.show();
            } else {
                showAlert('error', 'Gagal memuat detail layanan');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat memuat detail layanan');
        });
}

// Edit service function
function editService(id) {
    const API_BASE_URL = window.API_BASE_URL || '';
    console.log('Editing service ID:', id);
    
    fetch(`${API_BASE_URL}/admin/services/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show edit modal first
                const modalElement = document.getElementById('modal-edit-service');
                if (!modalElement) {
                    console.error('Edit modal not found');
                    showAlert('error', 'Modal edit tidak ditemukan');
                    return;
                }
                
                // Create modal instance safely
                let modal;
                try {
                    modal = new bootstrap.Modal(modalElement, {
                        backdrop: true,
                        keyboard: true,
                        focus: true
                    });
                } catch (error) {
                    console.error('Error creating modal:', error);
                    showAlert('error', 'Gagal membuka modal edit');
                    return;
                }
                
                // Populate edit form after modal is shown
                modalElement.addEventListener('shown.bs.modal', function() {
                    const editForm = document.getElementById('edit-service-form');
                    if (editForm) {
                        editForm.querySelector('input[name="name"]').value = data.service.name;
                        editForm.querySelector('select[name="category"]').value = data.service.category;
                        editForm.querySelector('textarea[name="description"]').value = data.service.description;
                        editForm.querySelector('select[name="type"]').value = data.service.type;
                        editForm.querySelector('select[name="icon"]').value = data.service.icon || '';
                        editForm.querySelector('input[name="processing_days"]').value = data.service.processing_days;
                        editForm.querySelector('input[name="fee"]').value = data.service.fee || 0;
                        editForm.querySelector('textarea[name="requirements"]').value = data.service.requirements || '';
                        editForm.querySelector('textarea[name="procedures"]').value = data.service.procedures || '';
                        
                        // Handle checkbox for is_active
                        const isActiveCheckbox = editForm.querySelector('input[name="is_active"]');
                        if (isActiveCheckbox) {
                            isActiveCheckbox.checked = data.service.is_active;
                        }
                        
                        editForm.action = `${API_BASE_URL}/admin/services/${id}`;
                        
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
                }, { once: true });
                
                // Show modal
                modal.show();
            } else {
                showAlert('error', 'Gagal memuat data layanan');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat memuat data layanan');
        });
}

// Delete service function
function deleteService(id) {
    if (confirm('Apakah Anda yakin ingin menghapus layanan ini? Tindakan ini tidak dapat dibatalkan.')) {
        const API_BASE_URL = window.API_BASE_URL || '';
        console.log('Deleting service ID:', id);
        
        fetch(`${API_BASE_URL}/admin/services/${id}`, {
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
                showAlert('error', data.message || 'Gagal menghapus layanan');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat menghapus layanan');
        });
    }
}

// View request function
function viewRequest(id) {
    const API_BASE_URL = window.API_BASE_URL || '';
    console.log('Viewing request ID:', id);
    
    fetch(`${API_BASE_URL}/admin/service-requests/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const modalContent = document.getElementById('modal-detail-content');
                if (modalContent) {
                    modalContent.innerHTML = `
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Informasi Pengajuan</h6>
                                <ul class="list-unstyled">
                                    <li><strong>No. Pengajuan:</strong> ${data.request.request_number}</li>
                                    <li><strong>Nama:</strong> ${data.request.full_name}</li>
                                    <li><strong>NIK:</strong> ${data.request.nik}</li>
                                    <li><strong>Tempat Lahir:</strong> ${data.request.birth_place}</li>
                                    <li><strong>Tanggal Lahir:</strong> ${data.request.birth_date}</li>
                                    <li><strong>Jenis Kelamin:</strong> ${data.request.gender}</li>
                                    <li><strong>Alamat:</strong> ${data.request.address}</li>
                                    <li><strong>Telepon:</strong> ${data.request.phone}</li>
                                    <li><strong>Email:</strong> ${data.request.email || 'Tidak ada'}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6>Detail Layanan</h6>
                                <ul class="list-unstyled">
                                    <li><strong>Layanan:</strong> ${data.request.service.name}</li>
                                    <li><strong>Kategori:</strong> ${data.request.service.category}</li>
                                    <li><strong>Status:</strong> 
                                        <span class="badge ${data.request.status === 'pending' ? 'bg-warning' : (data.request.status === 'processing' ? 'bg-info' : (data.request.status === 'completed' ? 'bg-success' : 'bg-danger'))} text-light">
                                            ${data.request.status_text}
                                        </span>
                                    </li>
                                    <li><strong>Tanggal Pengajuan:</strong> ${data.request.created_at}</li>
                                    ${data.request.processed_at ? `<li><strong>Tanggal Diproses:</strong> ${data.request.processed_at}</li>` : ''}
                                    ${data.request.completed_at ? `<li><strong>Tanggal Selesai:</strong> ${data.request.completed_at}</li>` : ''}
                                </ul>
                                ${data.request.additional_info ? `
                                <h6>Keterangan Tambahan</h6>
                                <p>${data.request.additional_info}</p>
                                ` : ''}
                                ${data.request.admin_notes ? `
                                <h6>Catatan Admin</h6>
                                <p>${data.request.admin_notes}</p>
                                ` : ''}
                            </div>
                        </div>
                    `;
                }
                
                // Show modal
                const modal = new bootstrap.Modal(document.getElementById('modal-detail'));
                modal.show();
            } else {
                showAlert('error', 'Gagal memuat detail pengajuan');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat memuat detail pengajuan');
        });
}

// Update status function
function updateStatus(id) {
    const API_BASE_URL = window.API_BASE_URL || '';
    console.log('Updating status for request ID:', id);
    
    // Set request ID
    document.getElementById('request_id').value = id;
    
    // Show modal
    const modal = new bootstrap.Modal(document.getElementById('modal-status'));
    modal.show();
}

// Show alert function
function showAlert(type, message) {
    // Remove existing alerts
    const existingAlerts = document.querySelectorAll('.alert-custom');
    existingAlerts.forEach(alert => alert.remove());
    
    // Create alert element
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show alert-custom`;
    alertDiv.style.position = 'fixed';
    alertDiv.style.top = '20px';
    alertDiv.style.right = '20px';
    alertDiv.style.zIndex = '9999';
    alertDiv.style.minWidth = '300px';
    
    alertDiv.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
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
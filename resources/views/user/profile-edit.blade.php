@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="edit-profile-container">
    <!-- Hero Section -->
    <div class="edit-hero">
        <div class="hero-background"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="edit-header-card">
                        <div class="header-content">
                            <div class="header-icon">
                                <i class="fas fa-user-edit"></i>
                            </div>
                            <div class="header-text">
                                <h1>Edit Profile</h1>
                                <p>Update your personal information and preferences</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="container edit-content">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <div class="edit-form-card">
                    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Avatar Section -->
                        <div class="form-section avatar-section">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-camera"></i>
                                </div>
                                <div class="section-title">
                                    <h3>Profile Picture</h3>
                                    <p>Click on the image below to upload a new profile picture. Supported formats: JPG, PNG, GIF, WebP. Max size: 2MB.</p>
                                </div>
                            </div>
                            <div class="avatar-upload-area">
                                <div class="avatar-preview">
                                    @if($user->avatar)
                                        <img src="{{ asset($user->avatar) }}" alt="Profile Picture" class="preview-image">
                                    @else
                                        <div class="avatar-placeholder">
                                            <span class="avatar-initial">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                        </div>
                                    @endif
                                    <div class="avatar-overlay">
                                        <i class="fas fa-camera"></i>
                                        <span>Change Photo</span>
                                    </div>
                                </div>
                                <input type="file" class="avatar-input" id="avatar" name="avatar" accept="image/jpeg,image/jpg,image/png,image/gif,image/webp">
                                @if($user->avatar)
                                    <button type="button" class="btn-remove-avatar" onclick="deleteAvatar()">
                                        <i class="fas fa-trash"></i>
                                        Remove Photo
                                    </button>
                                @endif
                            </div>
                        </div>

                        <!-- Basic Information -->
                        <div class="form-section basic-info">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="section-title">
                                    <h3>Basic Information</h3>
                                    <p>Your personal details and contact information</p>
                                </div>
                            </div>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <input type="text" class="modern-input @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="modern-input @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="modern-input @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                                    <input type="date" class="modern-input @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}">
                                    @error('date_of_birth')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="modern-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Address Information -->
                        <div class="form-section address-info">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="section-title">
                                    <h3>Address Information</h3>
                                    <p>Your residential address details</p>
                                </div>
                            </div>
                            <div class="form-grid">
                                <div class="form-group full-width">
                                    <label for="address_line_1" class="form-label">Address Line 1</label>
                                    <input type="text" class="modern-input @error('address_line_1') is-invalid @enderror" id="address_line_1" name="address_line_1" value="{{ old('address_line_1', $user->address_line_1) }}">
                                    @error('address_line_1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group full-width">
                                    <label for="address_line_2" class="form-label">Address Line 2</label>
                                    <input type="text" class="modern-input @error('address_line_2') is-invalid @enderror" id="address_line_2" name="address_line_2" value="{{ old('address_line_2', $user->address_line_2) }}">
                                    @error('address_line_2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="modern-input @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city', $user->city) }}">
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" class="modern-input @error('state') is-invalid @enderror" id="state" name="state" value="{{ old('state', $user->state) }}">
                                    @error('state')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="postal_code" class="form-label">Postal Code</label>
                                    <input type="text" class="modern-input @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}">
                                    @error('postal_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" class="modern-input @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country', $user->country) }}">
                                    @error('country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="form-section additional-info">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <div class="section-title">
                                    <h3>Additional Information</h3>
                                    <p>Tell us more about yourself</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea class="modern-textarea @error('bio') is-invalid @enderror" id="bio" name="bio" rows="4" placeholder="Tell us about yourself...">{{ old('bio', $user->bio) }}</textarea>
                                @error('bio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Notification Preferences -->
                        <div class="form-section notifications-info">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <div class="section-title">
                                    <h3>Notification Preferences</h3>
                                    <p>Choose how you want to receive updates</p>
                                </div>
                            </div>
                            <div class="notification-options">
                                <div class="notification-option">
                                    <div class="option-content">
                                        <div class="option-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="option-text">
                                            <h4>Email Notifications</h4>
                                            <p>Receive updates via email</p>
                                        </div>
                                    </div>
                                    <div class="option-toggle">
                                        <input type="checkbox" id="email_notifications" name="email_notifications" value="1" {{ old('email_notifications', $user->email_notifications) ? 'checked' : '' }} class="toggle-input">
                                        <label for="email_notifications" class="toggle-label">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="notification-option">
                                    <div class="option-content">
                                        <div class="option-icon">
                                            <i class="fas fa-sms"></i>
                                        </div>
                                        <div class="option-text">
                                            <h4>SMS Notifications</h4>
                                            <p>Receive updates via SMS</p>
                                        </div>
                                    </div>
                                    <div class="option-toggle">
                                        <input type="checkbox" id="sms_notifications" name="sms_notifications" value="1" {{ old('sms_notifications', $user->sms_notifications) ? 'checked' : '' }} class="toggle-input">
                                        <label for="sms_notifications" class="toggle-label">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <a href="{{ route('user.profile') }}" class="btn btn-cancel">
                                <i class="fas fa-arrow-left"></i>
                                <span>Cancel</span>
                            </a>
                            <button type="submit" class="btn btn-save">
                                <i class="fas fa-save"></i>
                                <span>Update Profile</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Avatar Form -->
<form id="deleteAvatarForm" action="{{ route('user.profile.avatar.delete') }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
    function deleteAvatar() {
        if (confirm('Are you sure you want to delete your profile picture?')) {
            document.getElementById('deleteAvatarForm').submit();
        }
    }

    // Initialize avatar upload functionality
    document.addEventListener('DOMContentLoaded', function() {
        const avatarPreview = document.querySelector('.avatar-preview');
        const avatarInput = document.getElementById('avatar');
        
        // Make avatar preview clickable to trigger file input
        if (avatarPreview && avatarInput) {
            avatarPreview.addEventListener('click', function() {
                avatarInput.click();
            });
        }

        // Preview uploaded image
        avatarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Validate file type - only allow specific image formats
                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Please select a valid image file. Only JPG, PNG, GIF, and WebP formats are allowed.');
                    return;
                }
                
                // Validate file size (2MB limit)
                if (file.size > 2 * 1024 * 1024) {
                    alert('File size must be less than 2MB.');
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.querySelector('.preview-image');
                    const placeholder = document.querySelector('.avatar-placeholder');
                    
                    if (img) {
                        img.src = e.target.result;
                    } else if (placeholder) {
                        placeholder.innerHTML = `<img src="${e.target.result}" alt="Profile Picture" class="preview-image">`;
                    }
                };
                reader.readAsDataURL(file);
            }
        });

        // Add smooth animations
        const formSections = document.querySelectorAll('.form-section');
        formSections.forEach((section, index) => {
            section.style.animationDelay = `${index * 0.1}s`;
        });
    });
</script>
@endpush

@push('styles')
<style>
/* Modern Edit Profile Styles */
.edit-profile-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
}

.edit-hero {
    padding: 3rem 0 2rem;
    position: relative;
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    opacity: 0.1;
}

.edit-header-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 2rem;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    animation: slideUp 0.8s ease-out;
}

.header-content {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.header-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
}

.header-text h1 {
    margin: 0;
    font-size: 2.5rem;
    font-weight: 700;
    color: #2d3748;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.header-text p {
    margin: 0.5rem 0 0 0;
    color: #718096;
    font-size: 1.1rem;
}

.edit-content {
    padding: 2rem 0;
    position: relative;
    z-index: 1;
}

.edit-form-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 2rem;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    animation: fadeInUp 0.6s ease-out;
}

.form-section {
    margin-bottom: 3rem;
    animation: fadeInUp 0.6s ease-out;
}

.section-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #f1f5f9;
}

.section-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: white;
}

.avatar-section .section-icon {
    background: linear-gradient(135deg, #f093fb, #f5576c);
}

.basic-info .section-icon {
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.address-info .section-icon {
    background: linear-gradient(135deg, #4facfe, #00f2fe);
}

.additional-info .section-icon {
    background: linear-gradient(135deg, #43e97b, #38f9d7);
}

.notifications-info .section-icon {
    background: linear-gradient(135deg, #fa709a, #fee140);
}

.section-title h3 {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
    color: #2d3748;
}

.section-title p {
    margin: 0.25rem 0 0 0;
    color: #718096;
    font-size: 0.95rem;
}

.avatar-upload-area {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
}

.avatar-preview {
    position: relative;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 3px solid transparent;
}

.avatar-preview:hover {
    transform: scale(1.05);
    border-color: rgba(102, 126, 234, 0.3);
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.preview-image, .avatar-placeholder {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border: 4px solid #fff;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.avatar-placeholder {
    background: linear-gradient(135deg, #667eea, #764ba2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 3rem;
    font-weight: bold;
}

.avatar-initial {
    font-size: 3rem;
    font-weight: 700;
}

.avatar-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
    opacity: 0;
    transition: all 0.3s ease;
}

.avatar-preview:hover .avatar-overlay {
    opacity: 1;
}

.avatar-overlay i {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.avatar-overlay span {
    font-size: 0.9rem;
    font-weight: 500;
}

.avatar-input {
    display: none;
}

.btn-remove-avatar {
    background: linear-gradient(135deg, #f56565, #e53e3e);
    border: none;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-size: 0.9rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.btn-remove-avatar:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(245, 101, 101, 0.4);
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-label {
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
}

.modern-input, .modern-select, .modern-textarea {
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #fff;
}

.modern-input:focus, .modern-select:focus, .modern-textarea:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    outline: none;
}

.modern-textarea {
    resize: vertical;
    min-height: 100px;
}

.notification-options {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.notification-option {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.5rem;
    background: rgba(0, 0, 0, 0.02);
    border-radius: 16px;
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

.notification-option:hover {
    background: rgba(0, 0, 0, 0.05);
    border-color: rgba(102, 126, 234, 0.2);
}

.option-content {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.option-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: white;
}

.notification-option:first-child .option-icon {
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.notification-option:last-child .option-icon {
    background: linear-gradient(135deg, #f093fb, #f5576c);
}

.option-text h4 {
    margin: 0 0 0.25rem 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #2d3748;
}

.option-text p {
    margin: 0;
    font-size: 0.9rem;
    color: #718096;
}

.toggle-input {
    display: none;
}

.toggle-label {
    position: relative;
    width: 60px;
    height: 32px;
    background: #e2e8f0;
    border-radius: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.toggle-slider {
    position: absolute;
    top: 2px;
    left: 2px;
    width: 28px;
    height: 28px;
    background: white;
    border-radius: 50%;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.toggle-input:checked + .toggle-label {
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.toggle-input:checked + .toggle-label .toggle-slider {
    transform: translateX(28px);
}

.form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 2px solid #f1f5f9;
}

.btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 2rem;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    border: none;
    transition: all 0.3s ease;
    font-size: 1rem;
}

.btn-cancel {
    background: #f7fafc;
    color: #4a5568;
    border: 2px solid #e2e8f0;
}

.btn-cancel:hover {
    background: #edf2f7;
    color: #2d3748;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.btn-save {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}

.btn-save:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
}

/* Responsive Design */
@media (max-width: 768px) {
    .edit-header-card {
        padding: 1.5rem;
    }
    
    .header-content {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .header-text h1 {
        font-size: 2rem;
    }
    
    .edit-form-card {
        padding: 1.5rem;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .form-actions {
        flex-direction: column;
        gap: 1rem;
    }
    
    .btn {
        width: 100%;
        justify-content: center;
    }
    
    .notification-option {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
}
</style>
@endpush

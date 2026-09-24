@extends('layouts.user')

@section('title', 'My Profile')
@section('page-title', 'My Profile')

@section('content')
<div class="profile-container">
    <!-- Hero Section -->
    <div class="profile-hero">
        <div class="hero-background"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="profile-header-card">
                        <div class="profile-avatar-section">
                            <div class="avatar-container">
                                @if($user->avatar)
                                    <img src="{{ asset($user->avatar) }}" alt="Profile Picture" class="profile-avatar">
                                @else
                                    <div class="avatar-placeholder">
                                        <span class="avatar-initial">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                    </div>
                                @endif
                                <div class="avatar-ring"></div>
                            </div>
                            <div class="profile-actions">
                                <a href="{{ route('user.profile.edit') }}" class="btn btn-edit">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit Profile</span>
                                </a>
                            </div>
                        </div>
                        
                        <div class="profile-info">
                            <h1 class="profile-name">{{ $user->name }}</h1>
                            <p class="profile-email">{{ $user->email }}</p>
                            
                            <div class="profile-stats">
                                @if($user->phone)
                                    <div class="stat-item">
                                        <i class="fas fa-phone"></i>
                                        <span>{{ $user->formatted_phone }}</span>
                                    </div>
                                @endif
                                @if($user->date_of_birth)
                                    <div class="stat-item">
                                        <i class="fas fa-birthday-cake"></i>
                                        <span>{{ \Carbon\Carbon::parse($user->date_of_birth)->format('F j, Y') }}</span>
                                    </div>
                                @endif
                                @if($user->gender)
                                    <div class="stat-item">
                                        <i class="fas fa-user"></i>
                                        <span>{{ ucfirst($user->gender) }}</span>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="profile-status">
                                @if($user->hasCompleteProfile())
                                    <div class="status-badge complete">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Complete Profile</span>
                                    </div>
                                @else
                                    <div class="status-badge incomplete">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        <span>Incomplete Profile</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container profile-content">
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

                <!-- Profile Information Cards -->
                <div class="row g-4">
                    <!-- Personal Information -->
                    <div class="col-lg-6">
                        <div class="info-card personal-info">
                            <div class="card-header">
                                <div class="header-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <h3>Personal Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="info-grid">
                                    <div class="info-item">
                                        <div class="info-label">Full Name</div>
                                        <div class="info-value">{{ $user->name ?: 'Not provided' }}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Email Address</div>
                                        <div class="info-value">{{ $user->email }}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Phone Number</div>
                                        <div class="info-value">{{ $user->formatted_phone ?: 'Not provided' }}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Date of Birth</div>
                                        <div class="info-value">{{ $user->date_of_birth ? \Carbon\Carbon::parse($user->date_of_birth)->format('F j, Y') : 'Not provided' }}</div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Gender</div>
                                        <div class="info-value">{{ $user->gender ? ucfirst($user->gender) : 'Not provided' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Address Information -->
                    <div class="col-lg-6">
                        <div class="info-card address-info">
                            <div class="card-header">
                                <div class="header-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h3>Address Information</h3>
                                <button class="btn-edit-address" data-bs-toggle="modal" data-bs-target="#addressModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                @if($user->full_address)
                                    <div class="address-display">
                                        @if($user->address_line_1)
                                            <div class="address-line">{{ $user->address_line_1 }}</div>
                                        @endif
                                        @if($user->address_line_2)
                                            <div class="address-line">{{ $user->address_line_2 }}</div>
                                        @endif
                                        <div class="address-line">
                                            @if($user->city){{ $user->city }}, @endif
                                            @if($user->state){{ $user->state }} @endif
                                            @if($user->postal_code){{ $user->postal_code }}@endif
                                        </div>
                                        @if($user->country)
                                            <div class="address-line">{{ $user->country }}</div>
                                        @endif
                                    </div>
                                @else
                                    <div class="no-address">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>No address information provided</p>
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addressModal">
                                            <i class="fas fa-plus"></i>
                                            Add Address
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                @if($user->bio)
                <div class="row g-4 mt-2">
                    <div class="col-12">
                        <div class="info-card bio-info">
                            <div class="card-header">
                                <div class="header-icon">
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <h3>About Me</h3>
                            </div>
                            <div class="card-body">
                                <div class="bio-content">
                                    {{ $user->bio }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Notification Preferences -->
                <div class="row g-4 mt-2">
                    <div class="col-12">
                        <div class="info-card notifications-info">
                            <div class="card-header">
                                <div class="header-icon">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <h3>Notification Preferences</h3>
                            </div>
                            <div class="card-body">
                                <div class="notification-grid">
                                    <div class="notification-item">
                                        <div class="notification-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="notification-content">
                                            <h4>Email Notifications</h4>
                                            <p>Receive updates via email</p>
                                        </div>
                                        <div class="notification-status">
                                            <div class="toggle-switch {{ $user->email_notifications ? 'active' : '' }}">
                                                <div class="toggle-slider"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="notification-item">
                                        <div class="notification-icon">
                                            <i class="fas fa-sms"></i>
                                        </div>
                                        <div class="notification-content">
                                            <h4>SMS Notifications</h4>
                                            <p>Receive updates via SMS</p>
                                        </div>
                                        <div class="notification-status">
                                            <div class="toggle-switch {{ $user->sms_notifications ? 'active' : '' }}">
                                                <div class="toggle-slider"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Address Modal -->
<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modern-modal">
            <form action="{{ route('user.profile.address.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <div class="modal-title-section">
                        <div class="modal-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h5 class="modal-title" id="addressModalLabel">Update Address</h5>
                            <p class="modal-subtitle">Keep your address information up to date</p>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="address_line_1" class="form-label">Address Line 1 *</label>
                        <input type="text" class="form-control modern-input" id="address_line_1" name="address_line_1" value="{{ old('address_line_1', $user->address_line_1) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address_line_2" class="form-label">Address Line 2</label>
                        <input type="text" class="form-control modern-input" id="address_line_2" name="address_line_2" value="{{ old('address_line_2', $user->address_line_2) }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city" class="form-label">City *</label>
                                <input type="text" class="form-control modern-input" id="city" name="city" value="{{ old('city', $user->city) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state" class="form-label">State *</label>
                                <input type="text" class="form-control modern-input" id="state" name="state" value="{{ old('state', $user->state) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postal_code" class="form-label">Postal Code *</label>
                                <input type="text" class="form-control modern-input" id="postal_code" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country" class="form-label">Country *</label>
                                <input type="text" class="form-control modern-input" id="country" name="country" value="{{ old('country', $user->country) }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modern-btn" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary modern-btn">
                        <i class="fas fa-save me-2"></i>Update Address
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
/* Modern Profile Styles */
.profile-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
}

.profile-hero {
    padding: 4rem 0 2rem;
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

.profile-header-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    padding: 2rem;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    animation: slideUp 0.8s ease-out;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.profile-avatar-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    margin-bottom: 2rem;
}

.avatar-container {
    position: relative;
    margin-bottom: 1.5rem;
}

.profile-avatar, .avatar-placeholder {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    border: 4px solid #fff;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.profile-avatar:hover, .avatar-placeholder:hover {
    transform: scale(1.05);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
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

.avatar-ring {
    position: absolute;
    top: -8px;
    left: -8px;
    right: -8px;
    bottom: -8px;
    border: 2px solid rgba(102, 126, 234, 0.3);
    border-radius: 50%;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    100% {
        transform: scale(1.1);
        opacity: 0;
    }
}

.profile-actions {
    margin-top: 1rem;
}

.btn-edit {
    background: linear-gradient(135deg, #667eea, #764ba2);
    border: none;
    color: white;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}

.btn-edit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
    color: white;
}

.profile-info {
    text-align: center;
}

.profile-name {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.5rem;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.profile-email {
    font-size: 1.1rem;
    color: #718096;
    margin-bottom: 1.5rem;
}

.profile-stats {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: rgba(102, 126, 234, 0.1);
    border-radius: 20px;
    color: #4a5568;
    font-weight: 500;
}

.stat-item i {
    color: #667eea;
}

.profile-status {
    display: flex;
    justify-content: center;
}

.status-badge {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.9rem;
}

.status-badge.complete {
    background: rgba(72, 187, 120, 0.1);
    color: #38a169;
}

.status-badge.incomplete {
    background: rgba(245, 158, 11, 0.1);
    color: #d69e2e;
}

.profile-content {
    padding: 2rem 0;
    position: relative;
    z-index: 1;
}

.info-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.info-card .card-header {
    background: linear-gradient(135deg, #f7fafc, #edf2f7);
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.header-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: white;
}

.personal-info .header-icon {
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.address-info .header-icon {
    background: linear-gradient(135deg, #f093fb, #f5576c);
}

.bio-info .header-icon {
    background: linear-gradient(135deg, #4facfe, #00f2fe);
}

.notifications-info .header-icon {
    background: linear-gradient(135deg, #43e97b, #38f9d7);
}

.info-card h3 {
    margin: 0;
    font-size: 1.3rem;
    font-weight: 600;
    color: #2d3748;
}

.btn-edit-address {
    background: linear-gradient(135deg, #f093fb, #f5576c);
    border: none;
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: auto;
    transition: all 0.3s ease;
}

.btn-edit-address:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 15px rgba(240, 147, 251, 0.4);
}

.info-card .card-body {
    padding: 1.5rem;
}

.info-grid {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.info-item {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.info-label {
    font-size: 0.85rem;
    font-weight: 600;
    color: #718096;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.info-value {
    font-size: 1rem;
    color: #2d3748;
    font-weight: 500;
}

.address-display {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.address-line {
    color: #4a5568;
    font-weight: 500;
}

.no-address {
    text-align: center;
    padding: 2rem;
    color: #718096;
}

.no-address i {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: #cbd5e0;
}

.bio-content {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #4a5568;
    font-style: italic;
}

.notification-grid {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.notification-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: rgba(0, 0, 0, 0.02);
    border-radius: 12px;
    transition: all 0.3s ease;
}

.notification-item:hover {
    background: rgba(0, 0, 0, 0.05);
}

.notification-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: white;
}

.notification-item:first-child .notification-icon {
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.notification-item:last-child .notification-icon {
    background: linear-gradient(135deg, #f093fb, #f5576c);
}

.notification-content {
    flex: 1;
}

.notification-content h4 {
    margin: 0 0 0.25rem 0;
    font-size: 1rem;
    font-weight: 600;
    color: #2d3748;
}

.notification-content p {
    margin: 0;
    font-size: 0.9rem;
    color: #718096;
}

.toggle-switch {
    width: 50px;
    height: 26px;
    background: #e2e8f0;
    border-radius: 13px;
    position: relative;
    cursor: pointer;
    transition: all 0.3s ease;
}

.toggle-switch.active {
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.toggle-slider {
    width: 22px;
    height: 22px;
    background: white;
    border-radius: 50%;
    position: absolute;
    top: 2px;
    left: 2px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.toggle-switch.active .toggle-slider {
    transform: translateX(24px);
}

/* Modal Styles */
.modern-modal {
    border: none;
    border-radius: 20px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
}

.modern-modal .modal-header {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border: none;
    border-radius: 20px 20px 0 0;
    padding: 2rem;
}

.modal-title-section {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.modal-icon {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.modal-title {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
}

.modal-subtitle {
    margin: 0;
    opacity: 0.9;
    font-size: 0.9rem;
}

.modern-modal .modal-body {
    padding: 2rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.modern-input {
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.modern-input:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    outline: none;
}

.modern-modal .modal-footer {
    border: none;
    padding: 1.5rem 2rem;
    background: #f7fafc;
    border-radius: 0 0 20px 20px;
}

.modern-btn {
    padding: 0.75rem 2rem;
    border-radius: 12px;
    font-weight: 600;
    border: none;
    transition: all 0.3s ease;
}

.modern-btn.btn-primary {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
}

.modern-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

/* Responsive Design */
@media (max-width: 768px) {
    .profile-header-card {
        padding: 1.5rem;
    }
    
    .profile-name {
        font-size: 2rem;
    }
    
    .profile-stats {
        flex-direction: column;
        align-items: center;
    }
    
    .info-card .card-header {
        padding: 1rem;
    }
    
    .info-card .card-body {
        padding: 1rem;
    }
    
    .notification-item {
        flex-direction: column;
        text-align: center;
        gap: 0.5rem;
    }
}
</style>
@endpush

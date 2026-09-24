@extends('admin.layout')

@section('title', 'My Profile')
@section('page-title', 'My Profile')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body text-center">
                <div class="profile-avatar mb-3">
                    @if(auth()->user()->avatar)
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}" class="rounded-circle" width="120" height="120">
                    @else
                        <div class="avatar-placeholder rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 120px; height: 120px; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: white; font-size: 3rem;">
                            <i class="fas fa-user-shield"></i>
                        </div>
                    @endif
                </div>
                <h4 class="mb-1">{{ auth()->user()->name }}</h4>
                <p class="text-muted mb-3">{{ auth()->user()->email }}</p>
                <span class="badge bg-primary">Administrator</span>
                
                <div class="mt-4">
                    <button class="btn btn-outline-primary btn-sm" onclick="document.getElementById('avatarInput').click()">
                        <i class="fas fa-camera me-2"></i>Change Avatar
                    </button>
                    <input type="file" id="avatarInput" accept="image/*" style="display: none;" onchange="updateAvatar(this)">
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-body">
                <h6 class="card-title">Quick Stats</h6>
                <div class="row text-center">
                    <div class="col-4">
                        <div class="border-end">
                            <h5 class="mb-1 text-primary">{{ \App\Models\User::count() }}</h5>
                            <small class="text-muted">Users</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="border-end">
                            <h5 class="mb-1 text-success">{{ \App\Models\Product::count() }}</h5>
                            <small class="text-muted">Products</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <h5 class="mb-1 text-warning">{{ \App\Models\Order::count() }}</h5>
                        <small class="text-muted">Orders</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Profile Information</h5>
                <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-edit me-2"></i>Edit Profile
                </a>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Full Name:</strong>
                    </div>
                    <div class="col-sm-9">
                        {{ auth()->user()->name }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Email:</strong>
                    </div>
                    <div class="col-sm-9">
                        {{ auth()->user()->email }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Phone:</strong>
                    </div>
                    <div class="col-sm-9">
                        {{ auth()->user()->phone ?? 'Not provided' }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Role:</strong>
                    </div>
                    <div class="col-sm-9">
                        <span class="badge bg-primary">Administrator</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Member Since:</strong>
                    </div>
                    <div class="col-sm-9">
                        {{ auth()->user()->created_at->format('F j, Y') }}
                    </div>
                </div>
                @if(auth()->user()->bio)
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Bio:</strong>
                    </div>
                    <div class="col-sm-9">
                        {{ auth()->user()->bio }}
                    </div>
                </div>
                @endif
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">Security</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Password:</strong>
                    </div>
                    <div class="col-sm-9">
                        <span class="text-muted">Last changed {{ auth()->user()->updated_at->diffForHumans() }}</span>
                        <a href="{{ route('admin.profile.security') }}" class="btn btn-outline-warning btn-sm ms-2">
                            <i class="fas fa-key me-2"></i>Change Password
                        </a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>Two-Factor Auth:</strong>
                    </div>
                    <div class="col-sm-9">
                        <span class="badge bg-secondary">Not Enabled</span>
                        <button class="btn btn-outline-info btn-sm ms-2">
                            <i class="fas fa-shield-alt me-2"></i>Enable 2FA
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function updateAvatar(input) {
    if (input.files && input.files[0]) {
        const formData = new FormData();
        formData.append('avatar', input.files[0]);
        formData.append('_token', '{{ csrf_token() }}');
        
        fetch('{{ route("admin.profile.avatar.update") }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update the avatar image
                const avatarImg = document.querySelector('.profile-avatar img');
                if (avatarImg) {
                    avatarImg.src = data.avatar_url;
                } else {
                    // Replace placeholder with image
                    const placeholder = document.querySelector('.avatar-placeholder');
                    if (placeholder) {
                        placeholder.outerHTML = `<img src="${data.avatar_url}" alt="{{ auth()->user()->name }}" class="rounded-circle" width="120" height="120">`;
                    }
                }
                
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message,
                    timer: 2000,
                    showConfirmButton: false
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to update avatar'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Failed to update avatar'
            });
        });
    }
}
</script>
@endsection

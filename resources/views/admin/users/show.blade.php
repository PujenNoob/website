@extends('admin.layout')

@section('title', 'View User')
@section('page-title', 'User Details: ' . $user->name)

@section('content')
    <div class="row">
        <!-- User Profile Card -->
        <div class="col-lg-4 mb-4">
            <div class="table-card">
                <div class="table-card-header">
                    <h5><i class="fas fa-user me-2"></i>User Profile</h5>
                </div>
                <div class="p-4 text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px; font-size: 2.5rem;">
                        {{ strtoupper(substr($user->name, 0, 2)) }}
                    </div>
                    <h4 class="mb-1">{{ $user->name }}</h4>
                    <p class="text-muted mb-3">{{ $user->email }}</p>
                    
                    <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-primary' }} fs-6 mb-3">
                        {{ ucfirst($user->role) }}
                    </span>
                    
                    @if($user->id === auth()->id())
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>This is your account
                        </div>
                    @endif
                    
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>Edit User
                        </a>
                        @if($user->id !== auth()->id())
                            <button type="button" 
                                    class="btn btn-danger" 
                                    onclick="confirmDelete('{{ route('admin.users.destroy', $user) }}', 'Delete User', 'Are you sure you want to delete {{ $user->name }}? This action cannot be undone.')">
                                <i class="fas fa-trash me-2"></i>Delete User
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <!-- User Details -->
        <div class="col-lg-8">
            <div class="table-card mb-4">
                <div class="table-card-header">
                    <h5><i class="fas fa-info-circle me-2"></i>Account Information</h5>
                </div>
                <div class="p-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">User ID</label>
                            <p class="h6">#{{ $user->id }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Full Name</label>
                            <p class="h6">{{ $user->name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Email Address</label>
                            <p class="h6">{{ $user->email }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Role</label>
                            <p class="h6">
                                <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-primary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Email Verification</label>
                            <p class="h6">
                                @if($user->email_verified_at)
                                    <span class="badge bg-success">
                                        <i class="fas fa-check me-1"></i>Verified
                                    </span>
                                    <br>
                                    <small class="text-muted">{{ $user->email_verified_at->format('M d, Y H:i') }}</small>
                                @else
                                    <span class="badge bg-warning">
                                        <i class="fas fa-exclamation-triangle me-1"></i>Not Verified
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Account Status</label>
                            <p class="h6">
                                <span class="badge bg-success">
                                    <i class="fas fa-check-circle me-1"></i>Active
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Timestamps -->
            <div class="table-card mb-4">
                <div class="table-card-header">
                    <h5><i class="fas fa-clock me-2"></i>Timestamps</h5>
                </div>
                <div class="p-4">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-muted">Account Created</label>
                            <p class="h6">{{ $user->created_at->format('M d, Y') }}</p>
                            <small class="text-muted">{{ $user->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-muted">Last Updated</label>
                            <p class="h6">{{ $user->updated_at->format('M d, Y') }}</p>
                            <small class="text-muted">{{ $user->updated_at->diffForHumans() }}</small>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-muted">Member For</label>
                            <p class="h6">{{ $user->created_at->diffInDays(now()) }} days</p>
                            <small class="text-muted">Since {{ $user->created_at->format('Y') }}</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Activity Summary (placeholder for future features) -->
            <div class="table-card">
                <div class="table-card-header">
                    <h5><i class="fas fa-chart-line me-2"></i>Activity Summary</h5>
                </div>
                <div class="p-4">
                    <div class="row text-center">
                        <div class="col-md-3 mb-3">
                            <div class="p-3">
                                <i class="fas fa-shopping-cart fa-2x text-primary mb-2"></i>
                                <h4 class="mb-1">0</h4>
                                <small class="text-muted">Orders</small>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-3">
                                <i class="fas fa-heart fa-2x text-danger mb-2"></i>
                                <h4 class="mb-1">0</h4>
                                <small class="text-muted">Wishlist</small>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-3">
                                <i class="fas fa-star fa-2x text-warning mb-2"></i>
                                <h4 class="mb-1">0</h4>
                                <small class="text-muted">Reviews</small>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-3">
                                <i class="fas fa-dollar-sign fa-2x text-success mb-2"></i>
                                <h4 class="mb-1">$0</h4>
                                <small class="text-muted">Total Spent</small>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Activity tracking will be available when order management is implemented
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Action Buttons -->
    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Users
        </a>
        <div>
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning me-2">
                <i class="fas fa-edit me-2"></i>Edit User
            </a>
            @if($user->id !== auth()->id())
                <button type="button" 
                        class="btn btn-danger" 
                        onclick="confirmDelete('{{ route('admin.users.destroy', $user) }}', 'Delete User', 'Are you sure you want to delete {{ $user->name }}? This action cannot be undone.')">
                    <i class="fas fa-trash me-2"></i>Delete User
                </button>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function confirmDelete(url, title, text) {
        Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete user!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = url;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                
                form.appendChild(csrfToken);
                form.appendChild(methodInput);
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endpush

@extends('admin.layout')

@section('title', 'Edit User')
@section('page-title', 'Edit User: ' . $user->name)

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="table-card">
                <div class="table-card-header">
                    <h5><i class="fas fa-user-edit me-2"></i>Edit User: {{ $user->name }}</h5>
                </div>
                <div class="p-4">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="admin-form">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name', $user->name) }}" 
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email', $user->email) }}" 
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password">
                                <small class="text-muted">Leave blank to keep current password</small>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" 
                                       class="form-control" 
                                       id="password_confirmation" 
                                       name="password_confirmation">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="role" class="form-label">Role *</label>
                            <select class="form-select @error('role') is-invalid @enderror" 
                                    id="role" 
                                    name="role" 
                                    required>
                                <option value="">Select Role</option>
                                <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($user->id === auth()->id())
                                <small class="text-warning d-block mt-1">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    You are editing your own account. Be careful with role changes.
                                </small>
                            @endif
                        </div>
                        
                        <!-- User Info -->
                        <div class="bg-light rounded p-3 mb-4">
                            <h6 class="mb-3">User Information</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <small class="text-muted">User ID:</small>
                                    <p class="mb-2"><strong>#{{ $user->id }}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <small class="text-muted">Member Since:</small>
                                    <p class="mb-2"><strong>{{ $user->created_at->format('M d, Y') }}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <small class="text-muted">Last Updated:</small>
                                    <p class="mb-0"><strong>{{ $user->updated_at->format('M d, Y H:i') }}</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <small class="text-muted">Email Verified:</small>
                                    <p class="mb-0">
                                        @if($user->email_verified_at)
                                            <span class="badge bg-success">Verified</span>
                                        @else
                                            <span class="badge bg-warning">Not Verified</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Users
                            </a>
                            <div>
                                <a href="{{ route('admin.users.show', $user) }}" class="btn btn-info me-2">
                                    <i class="fas fa-eye me-2"></i>View User
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Update User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

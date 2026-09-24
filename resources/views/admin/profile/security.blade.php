@extends('admin.layout')

@section('title', 'Security Settings')
@section('page-title', 'Security Settings')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Change Password</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.change-password') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                               id="current_password" name="current_password" required>
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">New Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Password must be at least 8 characters long</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm New Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" 
                               id="password_confirmation" name="password_confirmation" required>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.profile.show') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Profile
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-key me-2"></i>Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Two-Factor Authentication</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1">Two-Factor Authentication</h6>
                        <p class="text-muted mb-0">Add an extra layer of security to your account</p>
                        @if(auth()->user()->hasTwoFactorEnabled())
                            <small class="text-success">
                                <i class="fas fa-check-circle me-1"></i>
                                Enabled since {{ auth()->user()->two_factor_confirmed_at->format('M j, Y') }}
                            </small>
                        @endif
                    </div>
                    <div>
                        @if(auth()->user()->hasTwoFactorEnabled())
                            <span class="badge bg-success me-2">Enabled</span>
                            <a href="{{ route('admin.two-factor.show') }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-shield-alt me-2"></i>Manage 2FA
                            </a>
                        @else
                            <span class="badge bg-secondary me-2">Not Enabled</span>
                            <a href="{{ route('admin.two-factor.show') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-shield-alt me-2"></i>Enable 2FA
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Login Sessions</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Device</th>
                                <th>Location</th>
                                <th>Last Active</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <i class="fas fa-desktop me-2"></i>
                                    Chrome on Windows
                                </td>
                                <td>New York, NY</td>
                                <td>{{ now()->diffForHumans() }}</td>
                                <td><span class="badge bg-success">Current</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fas fa-mobile-alt me-2"></i>
                                    Safari on iPhone
                                </td>
                                <td>New York, NY</td>
                                <td>{{ now()->subHours(2)->diffForHumans() }}</td>
                                <td><span class="badge bg-secondary">Inactive</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

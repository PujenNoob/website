@extends('admin.layout')

@section('title', 'Admin Settings')
@section('page-title', 'Settings')

@push('styles')
<style>
    .settings-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border: 1px solid #f1f5f9;
        margin-bottom: 2rem;
        overflow: hidden;
    }
    
    .settings-card-header {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        padding: 1.5rem;
        border-bottom: 1px solid #e2e8f0;
    }
    
    .settings-card-header h5 {
        margin: 0;
        color: #1e293b;
        font-weight: 600;
    }
    
    .settings-card-header p {
        margin: 0.5rem 0 0 0;
        color: #64748b;
        font-size: 0.875rem;
    }
    
    .settings-card-body {
        padding: 2rem;
    }
    
    .form-section {
        margin-bottom: 2rem;
    }
    
    .form-section:last-child {
        margin-bottom: 0;
    }
    
    .form-section h6 {
        color: #374151;
        font-weight: 600;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #e5e7eb;
    }
    
    .form-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
    }
    
    .form-control, .form-select {
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }
    
    .btn-save {
        background: linear-gradient(135deg, #10b981, #047857);
        border: none;
        border-radius: 8px;
        padding: 0.75rem 2rem;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        color: white;
    }
    
    .btn-clear-cache {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        border: none;
        border-radius: 8px;
        padding: 0.75rem 2rem;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-clear-cache:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        color: white;
    }
    
    .settings-nav {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border: 1px solid #f1f5f9;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .settings-nav .nav-link {
        color: #64748b;
        font-weight: 500;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        margin-bottom: 0.5rem;
    }
    
    .settings-nav .nav-link:hover,
    .settings-nav .nav-link.active {
        background: #6366f1;
        color: white;
    }
    
    .settings-nav .nav-link i {
        width: 20px;
        text-align: center;
        margin-right: 0.75rem;
    }
</style>
@endpush

@section('content')
    <!-- Settings Navigation -->
    <div class="settings-nav">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="settings-tabs" role="tablist">
                    <a class="nav-link active" id="general-tab" data-bs-toggle="pill" href="#general" role="tab">
                        <i class="fas fa-cog"></i>General
                    </a>
                    <a class="nav-link" id="email-tab" data-bs-toggle="pill" href="#email" role="tab">
                        <i class="fas fa-envelope"></i>Email
                    </a>
                    <a class="nav-link" id="payment-tab" data-bs-toggle="pill" href="#payment" role="tab">
                        <i class="fas fa-credit-card"></i>Payment
                    </a>
                    <a class="nav-link" id="system-tab" data-bs-toggle="pill" href="#system" role="tab">
                        <i class="fas fa-server"></i>System
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="settings-tabContent">
                    <!-- General Settings -->
                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <div class="settings-card">
                            <div class="settings-card-header">
                                <h5><i class="fas fa-cog me-2"></i>General Settings</h5>
                                <p>Configure your site's basic information and preferences</p>
                            </div>
                            <div class="settings-card-body">
                                <form method="POST" action="{{ route('admin.settings.general.update') }}" class="admin-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-section">
                                                <h6>Site Information</h6>
                                                <div class="mb-3">
                                                    <label for="site_name" class="form-label">Site Name</label>
                                                    <input type="text" class="form-control" id="site_name" name="site_name" 
                                                           value="{{ $settings['general']['site_name'] }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="site_description" class="form-label">Site Description</label>
                                                    <textarea class="form-control" id="site_description" name="site_description" rows="3">{{ $settings['general']['site_description'] }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="site_email" class="form-label">Contact Email</label>
                                                    <input type="email" class="form-control" id="site_email" name="site_email" 
                                                           value="{{ $settings['general']['site_email'] }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="site_phone" class="form-label">Contact Phone</label>
                                                    <input type="text" class="form-control" id="site_phone" name="site_phone" 
                                                           value="{{ $settings['general']['site_phone'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-section">
                                                <h6>Regional Settings</h6>
                                                <div class="mb-3">
                                                    <label for="site_address" class="form-label">Site Address</label>
                                                    <textarea class="form-control" id="site_address" name="site_address" rows="3">{{ $settings['general']['site_address'] }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="currency" class="form-label">Currency</label>
                                                    <select class="form-select" id="currency" name="currency" required>
                                                        <option value="USD" {{ $settings['general']['currency'] == 'USD' ? 'selected' : '' }}>USD - US Dollar</option>
                                                        <option value="EUR" {{ $settings['general']['currency'] == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
                                                        <option value="GBP" {{ $settings['general']['currency'] == 'GBP' ? 'selected' : '' }}>GBP - British Pound</option>
                                                        <option value="CAD" {{ $settings['general']['currency'] == 'CAD' ? 'selected' : '' }}>CAD - Canadian Dollar</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="timezone" class="form-label">Timezone</label>
                                                    <select class="form-select" id="timezone" name="timezone" required>
                                                        <option value="America/New_York" {{ $settings['general']['timezone'] == 'America/New_York' ? 'selected' : '' }}>Eastern Time</option>
                                                        <option value="America/Chicago" {{ $settings['general']['timezone'] == 'America/Chicago' ? 'selected' : '' }}>Central Time</option>
                                                        <option value="America/Denver" {{ $settings['general']['timezone'] == 'America/Denver' ? 'selected' : '' }}>Mountain Time</option>
                                                        <option value="America/Los_Angeles" {{ $settings['general']['timezone'] == 'America/Los_Angeles' ? 'selected' : '' }}>Pacific Time</option>
                                                        <option value="Europe/London" {{ $settings['general']['timezone'] == 'Europe/London' ? 'selected' : '' }}>London</option>
                                                        <option value="Europe/Paris" {{ $settings['general']['timezone'] == 'Europe/Paris' ? 'selected' : '' }}>Paris</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-save">
                                            <i class="fas fa-save me-2"></i>Save General Settings
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Email Settings -->
                    <div class="tab-pane fade" id="email" role="tabpanel">
                        <div class="settings-card">
                            <div class="settings-card-header">
                                <h5><i class="fas fa-envelope me-2"></i>Email Settings</h5>
                                <p>Configure email server settings for notifications and communications</p>
                            </div>
                            <div class="settings-card-body">
                                <form method="POST" action="{{ route('admin.settings.email.update') }}" class="admin-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-section">
                                                <h6>SMTP Configuration</h6>
                                                <div class="mb-3">
                                                    <label for="mail_driver" class="form-label">Mail Driver</label>
                                                    <select class="form-select" id="mail_driver" name="mail_driver" required>
                                                        <option value="smtp" {{ $settings['email']['mail_driver'] == 'smtp' ? 'selected' : '' }}>SMTP</option>
                                                        <option value="mailgun" {{ $settings['email']['mail_driver'] == 'mailgun' ? 'selected' : '' }}>Mailgun</option>
                                                        <option value="ses" {{ $settings['email']['mail_driver'] == 'ses' ? 'selected' : '' }}>Amazon SES</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="mail_host" class="form-label">Mail Host</label>
                                                    <input type="text" class="form-control" id="mail_host" name="mail_host" 
                                                           value="{{ $settings['email']['mail_host'] }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="mail_port" class="form-label">Mail Port</label>
                                                    <input type="number" class="form-control" id="mail_port" name="mail_port" 
                                                           value="{{ $settings['email']['mail_port'] }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="mail_username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="mail_username" name="mail_username" 
                                                           value="{{ $settings['email']['mail_username'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-section">
                                                <h6>Authentication & From Address</h6>
                                                <div class="mb-3">
                                                    <label for="mail_password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="mail_password" name="mail_password" 
                                                           value="{{ $settings['email']['mail_password'] }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="mail_encryption" class="form-label">Encryption</label>
                                                    <select class="form-select" id="mail_encryption" name="mail_encryption">
                                                        <option value="tls" {{ $settings['email']['mail_encryption'] == 'tls' ? 'selected' : '' }}>TLS</option>
                                                        <option value="ssl" {{ $settings['email']['mail_encryption'] == 'ssl' ? 'selected' : '' }}>SSL</option>
                                                        <option value="" {{ $settings['email']['mail_encryption'] == '' ? 'selected' : '' }}>None</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="mail_from_address" class="form-label">From Address</label>
                                                    <input type="email" class="form-control" id="mail_from_address" name="mail_from_address" 
                                                           value="{{ $settings['email']['mail_from_address'] }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="mail_from_name" class="form-label">From Name</label>
                                                    <input type="text" class="form-control" id="mail_from_name" name="mail_from_name" 
                                                           value="{{ $settings['email']['mail_from_name'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-save">
                                            <i class="fas fa-save me-2"></i>Save Email Settings
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Settings -->
                    <div class="tab-pane fade" id="payment" role="tabpanel">
                        <div class="settings-card">
                            <div class="settings-card-header">
                                <h5><i class="fas fa-credit-card me-2"></i>Payment Settings</h5>
                                <p>Configure payment gateway settings for processing orders</p>
                            </div>
                            <div class="settings-card-body">
                                <form method="POST" action="{{ route('admin.settings.payment.update') }}" class="admin-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-section">
                                                <h6>Stripe Configuration</h6>
                                                <div class="mb-3">
                                                    <label for="stripe_public_key" class="form-label">Stripe Public Key</label>
                                                    <input type="text" class="form-control" id="stripe_public_key" name="stripe_public_key" 
                                                           value="{{ $settings['payment']['stripe_public_key'] }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="stripe_secret_key" class="form-label">Stripe Secret Key</label>
                                                    <input type="password" class="form-control" id="stripe_secret_key" name="stripe_secret_key" 
                                                           value="{{ $settings['payment']['stripe_secret_key'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-section">
                                                <h6>PayPal Configuration</h6>
                                                <div class="mb-3">
                                                    <label for="paypal_client_id" class="form-label">PayPal Client ID</label>
                                                    <input type="text" class="form-control" id="paypal_client_id" name="paypal_client_id" 
                                                           value="{{ $settings['payment']['paypal_client_id'] }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="paypal_client_secret" class="form-label">PayPal Client Secret</label>
                                                    <input type="password" class="form-control" id="paypal_client_secret" name="paypal_client_secret" 
                                                           value="{{ $settings['payment']['paypal_client_secret'] }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="default_payment_method" class="form-label">Default Payment Method</label>
                                                    <select class="form-select" id="default_payment_method" name="default_payment_method" required>
                                                        <option value="stripe" {{ $settings['payment']['default_payment_method'] == 'stripe' ? 'selected' : '' }}>Stripe</option>
                                                        <option value="paypal" {{ $settings['payment']['default_payment_method'] == 'paypal' ? 'selected' : '' }}>PayPal</option>
                                                        <option value="cash_on_delivery" {{ $settings['payment']['default_payment_method'] == 'cash_on_delivery' ? 'selected' : '' }}>Cash on Delivery</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-save">
                                            <i class="fas fa-save me-2"></i>Save Payment Settings
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- System Settings -->
                    <div class="tab-pane fade" id="system" role="tabpanel">
                        <div class="settings-card">
                            <div class="settings-card-header">
                                <h5><i class="fas fa-server me-2"></i>System Settings</h5>
                                <p>Configure system-wide settings and maintenance options</p>
                            </div>
                            <div class="settings-card-body">
                                <form method="POST" action="{{ route('admin.settings.system.update') }}" class="admin-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-section">
                                                <h6>Site Status</h6>
                                                <div class="mb-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="maintenance_mode" name="maintenance_mode" 
                                                               {{ $settings['system']['maintenance_mode'] ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="maintenance_mode">
                                                            Maintenance Mode
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="registration_enabled" name="registration_enabled" 
                                                               {{ $settings['system']['registration_enabled'] ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="registration_enabled">
                                                            Allow User Registration
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="email_verification_required" name="email_verification_required" 
                                                               {{ $settings['system']['email_verification_required'] ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="email_verification_required">
                                                            Require Email Verification
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-section">
                                                <h6>System Limits</h6>
                                                <div class="mb-3">
                                                    <label for="max_file_upload_size" class="form-label">Max File Upload Size (MB)</label>
                                                    <input type="number" class="form-control" id="max_file_upload_size" name="max_file_upload_size" 
                                                           value="{{ $settings['system']['max_file_upload_size'] }}" min="1" max="100" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="session_lifetime" class="form-label">Session Lifetime (minutes)</label>
                                                    <input type="number" class="form-control" id="session_lifetime" name="session_lifetime" 
                                                           value="{{ $settings['system']['session_lifetime'] }}" min="60" max="1440" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password_min_length" class="form-label">Minimum Password Length</label>
                                                    <input type="number" class="form-control" id="password_min_length" name="password_min_length" 
                                                           value="{{ $settings['system']['password_min_length'] }}" min="6" max="20" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-save">
                                            <i class="fas fa-save me-2"></i>Save System Settings
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Actions -->
    <div class="settings-card">
        <div class="settings-card-header">
            <h5><i class="fas fa-tools me-2"></i>System Actions</h5>
            <p>Perform maintenance and system operations</p>
        </div>
        <div class="settings-card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center">
                        <h6>Clear Cache</h6>
                        <p class="text-muted small">Clear application cache to improve performance</p>
                        <form method="POST" action="{{ route('admin.settings.clear-cache') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-clear-cache" onclick="return confirm('Are you sure you want to clear the cache?')">
                                <i class="fas fa-broom me-2"></i>Clear Cache
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <h6>System Info</h6>
                        <p class="text-muted small">View system information and status</p>
                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#systemInfoModal">
                            <i class="fas fa-info-circle me-2"></i>View Info
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Info Modal -->
    <div class="modal fade" id="systemInfoModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">System Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Application</h6>
                            <ul class="list-unstyled">
                                <li><strong>Laravel Version:</strong> {{ app()->version() }}</li>
                                <li><strong>PHP Version:</strong> {{ PHP_VERSION }}</li>
                                <li><strong>Environment:</strong> {{ app()->environment() }}</li>
                                <li><strong>Debug Mode:</strong> {{ config('app.debug') ? 'Enabled' : 'Disabled' }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6>Server</h6>
                            <ul class="list-unstyled">
                                <li><strong>Server Software:</strong> {{ $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown' }}</li>
                                <li><strong>Memory Limit:</strong> {{ ini_get('memory_limit') }}</li>
                                <li><strong>Max Execution Time:</strong> {{ ini_get('max_execution_time') }}s</li>
                                <li><strong>Upload Max Size:</strong> {{ ini_get('upload_max_filesize') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

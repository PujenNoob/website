@extends('admin.layout')

@section('title', 'Two-Factor Authentication')
@section('page-title', 'Two-Factor Authentication')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        @if(auth()->user()->hasTwoFactorEnabled())
            <!-- 2FA Enabled State -->
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-shield-alt me-2"></i>
                        Two-Factor Authentication Enabled
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-2"></i>
                        Your account is protected with two-factor authentication.
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Status</h6>
                            <p class="text-success">
                                <i class="fas fa-shield-alt me-2"></i>
                                Enabled since {{ auth()->user()->two_factor_confirmed_at->format('F j, Y \a\t g:i A') }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Recovery Codes</h6>
                            <p class="text-muted">
                                {{ count(auth()->user()->two_factor_recovery_codes ?? []) }} codes remaining
                            </p>
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2 mt-4">
                        <button class="btn btn-outline-warning" onclick="showRegenerateCodesModal()">
                            <i class="fas fa-refresh me-2"></i>
                            Regenerate Recovery Codes
                        </button>
                        <button class="btn btn-outline-danger" onclick="showDisableModal()">
                            <i class="fas fa-times me-2"></i>
                            Disable 2FA
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Recovery Codes Section -->
            @if(auth()->user()->two_factor_recovery_codes)
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">Recovery Codes</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Important:</strong> Store these recovery codes in a safe place. You can use them to access your account if you lose your authenticator device.
                    </div>
                    
                    <div class="row">
                        @foreach(auth()->user()->two_factor_recovery_codes as $code)
                        <div class="col-md-3 col-sm-4 col-6 mb-2">
                            <code class="bg-light p-2 d-block text-center">{{ $code }}</code>
                        </div>
                        @endforeach
                    </div>
                    
                    <button class="btn btn-outline-primary btn-sm mt-3" onclick="copyRecoveryCodes()">
                        <i class="fas fa-copy me-2"></i>
                        Copy All Codes
                    </button>
                </div>
            </div>
            @endif
            
        @else
            <!-- 2FA Setup State -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-shield-alt me-2"></i>
                        Enable Two-Factor Authentication
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Two-factor authentication adds an extra layer of security to your account by requiring a verification code from your mobile device.
                    </div>
                    
                    <div id="setup-step-1">
                        <h6>Step 1: Install an Authenticator App</h6>
                        <p class="text-muted">Download and install one of these authenticator apps on your mobile device:</p>
                        
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <i class="fab fa-google fa-3x text-primary mb-2"></i>
                                    <h6>Google Authenticator</h6>
                                    <small class="text-muted">Available for iOS and Android</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <i class="fas fa-mobile-alt fa-3x text-success mb-2"></i>
                                    <h6>Microsoft Authenticator</h6>
                                    <small class="text-muted">Available for iOS and Android</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <i class="fas fa-lock fa-3x text-warning mb-2"></i>
                                    <h6>Authy</h6>
                                    <small class="text-muted">Available for iOS and Android</small>
                                </div>
                            </div>
                        </div>
                        
                        <button class="btn btn-primary" onclick="startSetup()">
                            <i class="fas fa-arrow-right me-2"></i>
                            Start Setup
                        </button>
                    </div>
                    
                    <div id="setup-step-2" style="display: none;">
                        <h6>Step 2: Scan QR Code</h6>
                        <p class="text-muted">Scan this QR code with your authenticator app:</p>
                        
                        <div class="text-center mb-4">
                            <div id="qr-code-container" class="d-inline-block p-3 bg-white border rounded">
                                <!-- QR Code will be loaded here -->
                            </div>
                        </div>
                        
                        <div class="alert alert-light">
                            <h6>Can't scan the QR code?</h6>
                            <p class="mb-2">Enter this code manually in your authenticator app:</p>
                            <code id="manual-key" class="bg-light p-2 d-block"></code>
                        </div>
                        
                        <div class="alert alert-info">
                            <h6>Debug Information</h6>
                            <p class="mb-2">Current time: <span id="current-time"></span></p>
                            <p class="mb-2">Time slice: <span id="time-slice"></span></p>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-info" onclick="showDebugInfo()">Show Debug Info</button>
                                <button class="btn btn-sm btn-outline-warning" onclick="testImplementation()">Test Implementation</button>
                            </div>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-secondary" onclick="backToStep1()">
                                <i class="fas fa-arrow-left me-2"></i>
                                Back
                            </button>
                            <button class="btn btn-primary" onclick="proceedToStep3()">
                                <i class="fas fa-arrow-right me-2"></i>
                                I've Added the Account
                            </button>
                        </div>
                    </div>
                    
                    <div id="setup-step-3" style="display: none;">
                        <h6>Step 3: Verify Setup</h6>
                        <p class="text-muted">Enter the 6-digit code from your authenticator app to complete the setup:</p>
                        
                        <form id="verify-form">
                            @csrf
                            <div class="mb-3">
                                <label for="verification-code" class="form-label">Verification Code</label>
                                <input type="text" class="form-control text-center" id="verification-code" 
                                       placeholder="000000" maxlength="6" pattern="[0-9]{6}" required>
                                <div class="form-text">Enter the 6-digit code from your authenticator app</div>
                            </div>
                            
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-outline-secondary" onclick="backToStep2()">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    Back
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-check me-2"></i>
                                    Enable 2FA
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Disable 2FA Modal -->
<div class="modal fade" id="disableModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Disable Two-Factor Authentication</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Warning:</strong> Disabling two-factor authentication will make your account less secure.
                </div>
                
                <form id="disable-form">
                    @csrf
                    <div class="mb-3">
                        <label for="disable-password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="disable-password" required>
                        <div class="form-text">Enter your current password to confirm</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="disable2FA()">Disable 2FA</button>
            </div>
        </div>
    </div>
</div>

<!-- Regenerate Recovery Codes Modal -->
<div class="modal fade" id="regenerateModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Regenerate Recovery Codes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Warning:</strong> This will invalidate all existing recovery codes. Make sure to save the new codes.
                </div>
                
                <form id="regenerate-form">
                    @csrf
                    <div class="mb-3">
                        <label for="regenerate-password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="regenerate-password" required>
                        <div class="form-text">Enter your current password to confirm</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-warning" onclick="regenerateCodes()">Regenerate Codes</button>
            </div>
        </div>
    </div>
</div>

<script>
let currentSecret = null;

function startSetup() {
    document.getElementById('setup-step-1').style.display = 'none';
    document.getElementById('setup-step-2').style.display = 'block';
    
    // Generate secret and show QR code
    fetch('{{ route("admin.two-factor.generate-secret") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.secret) {
            currentSecret = data.secret;
            document.getElementById('manual-key').textContent = data.manual_entry_key;
            
            // Generate QR code
            const qrContainer = document.getElementById('qr-code-container');
            qrContainer.innerHTML = `<img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${encodeURIComponent(data.qr_code_url)}" alt="QR Code" class="img-fluid">`;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire('Error', 'Failed to generate 2FA secret', 'error');
    });
}

function backToStep1() {
    document.getElementById('setup-step-2').style.display = 'none';
    document.getElementById('setup-step-1').style.display = 'block';
}

function proceedToStep3() {
    document.getElementById('setup-step-2').style.display = 'none';
    document.getElementById('setup-step-3').style.display = 'block';
}

function backToStep2() {
    document.getElementById('setup-step-3').style.display = 'none';
    document.getElementById('setup-step-2').style.display = 'block';
}

document.getElementById('verify-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const code = document.getElementById('verification-code').value;
    
    if (code.length !== 6) {
        Swal.fire('Error', 'Please enter a 6-digit code', 'error');
        return;
    }
    
    fetch('{{ route("admin.two-factor.enable") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ code: code })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: 'Success!',
                text: data.message,
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'Continue'
            }).then(() => {
                location.reload();
            });
        } else {
            let errorMessage = data.error;
            if (data.debug) {
                errorMessage += `\n\nDebug Info:\nEntered: ${data.debug.entered_code}\nCurrent: ${data.debug.current_code}\nPrevious: ${data.debug.previous_code}\nNext: ${data.debug.next_code}`;
            }
            Swal.fire('Error', errorMessage, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire('Error', 'Failed to enable 2FA', 'error');
    });
});

function showDisableModal() {
    const modal = new bootstrap.Modal(document.getElementById('disableModal'));
    modal.show();
}

function disable2FA() {
    const password = document.getElementById('disable-password').value;
    
    if (!password) {
        Swal.fire('Error', 'Please enter your password', 'error');
        return;
    }
    
    fetch('{{ route("admin.two-factor.disable") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ password: password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: 'Success!',
                text: data.message,
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload();
            });
        } else {
            Swal.fire('Error', data.error, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire('Error', 'Failed to disable 2FA', 'error');
    });
}

function showRegenerateCodesModal() {
    const modal = new bootstrap.Modal(document.getElementById('regenerateModal'));
    modal.show();
}

function regenerateCodes() {
    const password = document.getElementById('regenerate-password').value;
    
    if (!password) {
        Swal.fire('Error', 'Please enter your password', 'error');
        return;
    }
    
    fetch('{{ route("admin.two-factor.regenerate-recovery-codes") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ password: password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: 'Success!',
                text: data.message,
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload();
            });
        } else {
            Swal.fire('Error', data.error, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire('Error', 'Failed to regenerate codes', 'error');
    });
}

function copyRecoveryCodes() {
    const codes = @json(auth()->user()->two_factor_recovery_codes ?? []);
    const text = codes.join('\n');
    
    navigator.clipboard.writeText(text).then(() => {
        Swal.fire('Success', 'Recovery codes copied to clipboard!', 'success');
    }).catch(() => {
        Swal.fire('Error', 'Failed to copy codes', 'error');
    });
}

// Auto-format verification code input
document.getElementById('verification-code').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// Debug functions
function updateDebugInfo() {
    const now = new Date();
    const timeSlice = Math.floor(now.getTime() / 1000 / 30);
    document.getElementById('current-time').textContent = now.toLocaleTimeString();
    document.getElementById('time-slice').textContent = timeSlice;
}

function showDebugInfo() {
    fetch('{{ route("admin.two-factor.debug") }}')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                Swal.fire('Error', data.error, 'error');
                return;
            }
            
            let debugInfo = `
                <div class="text-left">
                    <h6>2FA Debug Information</h6>
                    <p><strong>Secret:</strong> ${data.secret}</p>
                    <p><strong>Time Slice:</strong> ${data.time_slice}</p>
                    <p><strong>Current Time:</strong> ${data.current_time}</p>
                    <p><strong>Current Code:</strong> ${data.current_code}</p>
                    <p><strong>Previous Code:</strong> ${data.previous_code}</p>
                    <p><strong>Next Code:</strong> ${data.next_code}</p>
                    <p><strong>Decoded Secret:</strong> ${data.decoded_secret}</p>
                </div>
            `;
            
            Swal.fire({
                title: 'Debug Information',
                html: debugInfo,
                width: '600px',
                showCloseButton: true
            });
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire('Error', 'Failed to get debug info', 'error');
        });
}

function testImplementation() {
    fetch('{{ route("admin.two-factor.test") }}')
        .then(response => response.json())
        .then(data => {
            let testInfo = `
                <div class="text-left">
                    <h6>2FA Implementation Test</h6>
                    <p><strong>Test Secret:</strong> ${data.test_secret}</p>
                    <p><strong>Time Slice:</strong> ${data.time_slice}</p>
                    <p><strong>Expected Code:</strong> ${data.expected_code}</p>
                    <p><strong>Verification Test:</strong> ${data.verification_test ? 'PASSED' : 'FAILED'}</p>
                    <hr>
                    <p><strong>Instructions:</strong></p>
                    <p>1. Add this test secret to your authenticator app: <code>${data.test_secret}</code></p>
                    <p>2. The expected code should be: <strong>${data.expected_code}</strong></p>
                    <p>3. If your authenticator shows a different code, there's a time sync issue</p>
                </div>
            `;
            
            Swal.fire({
                title: 'Implementation Test',
                html: testInfo,
                width: '600px',
                showCloseButton: true
            });
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire('Error', 'Failed to test implementation', 'error');
        });
}

// Update debug info every second
setInterval(updateDebugInfo, 1000);
updateDebugInfo();
</script>
@endsection

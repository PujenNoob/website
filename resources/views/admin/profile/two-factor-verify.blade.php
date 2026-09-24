@extends('admin.layout')

@section('title', 'Verify Two-Factor Authentication')
@section('page-title', 'Verify Two-Factor Authentication')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">
                    <i class="fas fa-shield-alt me-2"></i>
                    Two-Factor Authentication Required
                </h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Please enter the 6-digit code from your authenticator app to continue.
                </div>
                
                <form id="verify-form">
                    @csrf
                    <div class="mb-4">
                        <label for="verification-code" class="form-label">Verification Code</label>
                        <input type="text" class="form-control form-control-lg text-center" 
                               id="verification-code" placeholder="000000" maxlength="6" 
                               pattern="[0-9]{6}" required autofocus>
                        <div class="form-text">Enter the 6-digit code from your authenticator app</div>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-check me-2"></i>
                            Verify Code
                        </button>
                    </div>
                </form>
                
                <div class="text-center mt-4">
                    <button class="btn btn-link" onclick="showRecoveryCodeModal()">
                        <i class="fas fa-key me-2"></i>
                        Use Recovery Code Instead
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recovery Code Modal -->
<div class="modal fade" id="recoveryCodeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Use Recovery Code</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Important:</strong> Each recovery code can only be used once.
                </div>
                
                <form id="recovery-form">
                    @csrf
                    <div class="mb-3">
                        <label for="recovery-code" class="form-label">Recovery Code</label>
                        <input type="text" class="form-control text-center" id="recovery-code" 
                               placeholder="XXXXXXXX" maxlength="8" required>
                        <div class="form-text">Enter one of your 8-character recovery codes</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-warning" onclick="verifyRecoveryCode()">Verify Recovery Code</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('verify-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const code = document.getElementById('verification-code').value;
    
    if (code.length !== 6) {
        Swal.fire('Error', 'Please enter a 6-digit code', 'error');
        return;
    }
    
    verifyCode(code);
});

function verifyCode(code) {
    fetch('{{ route("admin.two-factor.verify") }}', {
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
            // Set session flag for 2FA verification
            sessionStorage.setItem('two_factor_verified', 'true');
            
            Swal.fire({
                title: 'Success!',
                text: 'Two-factor authentication verified successfully!',
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'Continue'
            }).then(() => {
                // Redirect to intended URL or dashboard
                const intendedUrl = new URLSearchParams(window.location.search).get('intended') || '{{ route("admin.dashboard") }}';
                window.location.href = intendedUrl;
            });
        } else {
            let errorMessage = data.error;
            if (data.debug) {
                errorMessage += `\n\nDebug Info:\nEntered: ${data.debug.entered_code}\nCurrent: ${data.debug.current_code}\nPrevious: ${data.debug.previous_code}\nNext: ${data.debug.next_code}`;
            }
            Swal.fire('Error', errorMessage, 'error');
            document.getElementById('verification-code').value = '';
            document.getElementById('verification-code').focus();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire('Error', 'Failed to verify code', 'error');
    });
}

function showRecoveryCodeModal() {
    const modal = new bootstrap.Modal(document.getElementById('recoveryCodeModal'));
    modal.show();
}

function verifyRecoveryCode() {
    const code = document.getElementById('recovery-code').value;
    
    if (!code) {
        Swal.fire('Error', 'Please enter a recovery code', 'error');
        return;
    }
    
    fetch('{{ route("admin.two-factor.verify") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ recovery_code: code })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Set session flag for 2FA verification
            sessionStorage.setItem('two_factor_verified', 'true');
            
            Swal.fire({
                title: 'Success!',
                text: 'Recovery code verified successfully!',
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'Continue'
            }).then(() => {
                // Redirect to intended URL or dashboard
                const intendedUrl = new URLSearchParams(window.location.search).get('intended') || '{{ route("admin.dashboard") }}';
                window.location.href = intendedUrl;
            });
        } else {
            Swal.fire('Error', data.error, 'error');
            document.getElementById('recovery-code').value = '';
            document.getElementById('recovery-code').focus();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire('Error', 'Failed to verify recovery code', 'error');
    });
}

// Auto-format verification code input
document.getElementById('verification-code').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// Auto-format recovery code input
document.getElementById('recovery-code').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^A-Z0-9]/g, '').toUpperCase();
});

// Auto-submit when 6 digits are entered
document.getElementById('verification-code').addEventListener('input', function(e) {
    if (this.value.length === 6) {
        verifyCode(this.value);
    }
});
</script>
@endsection

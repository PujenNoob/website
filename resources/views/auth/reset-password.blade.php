<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - MaleFashion</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .auth-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 450px;
            position: relative;
            overflow: hidden;
        }
        
        .auth-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
        }
        
        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .auth-logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 24px;
        }
        
        .auth-title {
            font-size: 28px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 8px;
        }
        
        .auth-subtitle {
            color: #718096;
            font-size: 16px;
            line-height: 1.5;
        }
        
        .form-group {
            margin-bottom: 24px;
            position: relative;
        }
        
        .form-label {
            display: block;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .form-control {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8fafc;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #718096;
            cursor: pointer;
            font-size: 18px;
            padding: 4px;
        }
        
        .password-toggle:hover {
            color: #667eea;
        }
        
        .btn-reset {
            width: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 16px 24px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }
        
        .btn-reset:active {
            transform: translateY(0);
        }
        
        .btn-reset::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-reset:hover::before {
            left: 100%;
        }
        
        .alert {
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 500;
            animation: slideIn 0.3s ease;
        }
        
        .alert-danger {
            background: #fed7d7;
            color: #c53030;
            border: 1px solid #feb2b2;
        }
        
        .alert-success {
            background: #c6f6d5;
            color: #2f855a;
            border: 1px solid #9ae6b4;
        }
        
        .back-link {
            text-align: center;
            margin-top: 24px;
        }
        
        .back-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: color 0.3s ease;
        }
        
        .back-link a:hover {
            color: #764ba2;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .password-strength {
            margin-top: 8px;
            font-size: 12px;
        }
        
        .strength-bar {
            height: 4px;
            background: #e2e8f0;
            border-radius: 2px;
            overflow: hidden;
            margin-top: 4px;
        }
        
        .strength-fill {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }
        
        .strength-weak { background: #f56565; width: 25%; }
        .strength-fair { background: #ed8936; width: 50%; }
        .strength-good { background: #38b2ac; width: 75%; }
        .strength-strong { background: #48bb78; width: 100%; }
        
        @media (max-width: 480px) {
            .auth-container {
                padding: 30px 20px;
                margin: 10px;
            }
            
            .auth-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <div class="auth-logo">
                <i class="fas fa-lock"></i>
            </div>
            <h1 class="auth-title">Reset Password</h1>
            <p class="auth-subtitle">Enter your new password below</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i>
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" id="resetForm">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ request()->query('email') }}">

            <div class="form-group">
                <label for="password" class="form-label">
                    <i class="fas fa-key"></i> New Password
                </label>
                <div style="position: relative;">
                    <input type="password" 
                           name="password" 
                           id="password" 
                           class="form-control" 
                           placeholder="Enter your new password" 
                           required 
                           minlength="8"
                           oninput="checkPasswordStrength()">
                    <button type="button" class="password-toggle" onclick="togglePassword('password')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <div class="password-strength" id="passwordStrength" style="display: none;">
                    <div class="strength-bar">
                        <div class="strength-fill" id="strengthFill"></div>
                    </div>
                    <span id="strengthText"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">
                    <i class="fas fa-check-double"></i> Confirm Password
                </label>
                <div style="position: relative;">
                    <input type="password" 
                           name="password_confirmation" 
                           id="password_confirmation" 
                           class="form-control" 
                           placeholder="Confirm your new password" 
                           required 
                           oninput="checkPasswordMatch()">
                    <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <div id="passwordMatch" style="font-size: 12px; margin-top: 4px;"></div>
            </div>

            <button type="submit" class="btn-reset">
                <i class="fas fa-save"></i> Reset Password
            </button>
        </form>

        <div class="back-link">
            <a href="{{ route('login') }}">
                <i class="fas fa-arrow-left"></i> Back to Login
            </a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Password toggle functionality
            $('.password-toggle').on('click', function() {
                const field = $(this).prev('input');
                const icon = $(this).find('i');
                
                if (field.attr('type') === 'password') {
                    field.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    field.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
            
            // Password strength checker
            $('#password').on('input', function() {
                const password = $(this).val();
                const strengthDiv = $('#passwordStrength');
                const strengthFill = $('#strengthFill');
                const strengthText = $('#strengthText');
                
                if (password.length === 0) {
                    strengthDiv.hide();
                    return;
                }
                
                strengthDiv.show();
                
                let strength = 0;
                let strengthLabel = '';
                
                // Check password criteria
                if (password.length >= 8) strength++;
                if (/[a-z]/.test(password)) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/[0-9]/.test(password)) strength++;
                if (/[^A-Za-z0-9]/.test(password)) strength++;
                
                // Update strength indicator
                switch (strength) {
                    case 0:
                    case 1:
                        strengthLabel = 'Very Weak';
                        strengthFill.removeClass().addClass('strength-fill strength-weak');
                        break;
                    case 2:
                        strengthLabel = 'Weak';
                        strengthFill.removeClass().addClass('strength-fill strength-weak');
                        break;
                    case 3:
                        strengthLabel = 'Fair';
                        strengthFill.removeClass().addClass('strength-fill strength-fair');
                        break;
                    case 4:
                        strengthLabel = 'Good';
                        strengthFill.removeClass().addClass('strength-fill strength-good');
                        break;
                    case 5:
                        strengthLabel = 'Strong';
                        strengthFill.removeClass().addClass('strength-fill strength-strong');
                        break;
                }
                
                strengthText.text(strengthLabel);
            });
            
            // Password match checker
            $('#password_confirmation').on('input', function() {
                const password = $('#password').val();
                const confirmPassword = $(this).val();
                const matchDiv = $('#passwordMatch');
                
                if (confirmPassword.length === 0) {
                    matchDiv.html('');
                    return;
                }
                
                if (password === confirmPassword) {
                    matchDiv.html('<i class="fas fa-check" style="color: #48bb78;"></i> Passwords match');
                } else {
                    matchDiv.html('<i class="fas fa-times" style="color: #f56565;"></i> Passwords do not match');
                }
            });
            
            // Form submission with enhanced validation
            $('#resetForm').on('submit', function(e) {
                const password = $('#password').val();
                const confirmPassword = $('#password_confirmation').val();
                
                // Clear previous errors
                $('.form-error').remove();
                
                let hasErrors = false;
                
                // Password validation
                if (password.length < 8) {
                    showFieldError('#password', 'Password must be at least 8 characters long');
                    hasErrors = true;
                }
                
                // Password match validation
                if (password !== confirmPassword) {
                    showFieldError('#password_confirmation', 'Passwords do not match');
                    hasErrors = true;
                }
                
                // Password strength validation
                if (password.length > 0) {
                    let strength = 0;
                    if (password.length >= 8) strength++;
                    if (/[a-z]/.test(password)) strength++;
                    if (/[A-Z]/.test(password)) strength++;
                    if (/[0-9]/.test(password)) strength++;
                    if (/[^A-Za-z0-9]/.test(password)) strength++;
                    
                    if (strength < 3) {
                        showFieldError('#password', 'Password is too weak. Please use a stronger password.');
                        hasErrors = true;
                    }
                }
                
                if (hasErrors) {
                    e.preventDefault();
                    // Scroll to first error
                    $('html, body').animate({
                        scrollTop: $('.form-error').first().offset().top - 100
                    }, 500);
                    return false;
                }
                
                // Show loading state
                const submitBtn = $('.btn-reset');
                const originalText = submitBtn.html();
                submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Resetting Password...');
                submitBtn.prop('disabled', true);
                
                // Re-enable button after 3 seconds (in case of network issues)
                setTimeout(function() {
                    submitBtn.html(originalText);
                    submitBtn.prop('disabled', false);
                }, 3000);
            });
            
            // Real-time form validation
            $('#password, #password_confirmation').on('blur', function() {
                const field = $(this);
                const value = field.val();
                
                if (field.attr('id') === 'password' && value.length > 0 && value.length < 8) {
                    showFieldError(field, 'Password must be at least 8 characters long');
                } else if (field.attr('id') === 'password_confirmation' && value.length > 0) {
                    const password = $('#password').val();
                    if (password !== value) {
                        showFieldError(field, 'Passwords do not match');
                    } else {
                        clearFieldError(field);
                    }
                } else {
                    clearFieldError(field);
                }
            });
            
            // Clear errors on input
            $('#password, #password_confirmation').on('input', function() {
                clearFieldError($(this));
            });
            
            // Helper function to show field errors
            function showFieldError(field, message) {
                clearFieldError(field);
                $(field).after('<div class="form-error" style="color: #f56565; font-size: 12px; margin-top: 4px;"><i class="fas fa-exclamation-circle"></i> ' + message + '</div>');
                $(field).addClass('error');
            }
            
            // Helper function to clear field errors
            function clearFieldError(field) {
                $(field).siblings('.form-error').remove();
                $(field).removeClass('error');
            }
            
            // Add error styling
            $('<style>')
                .prop('type', 'text/css')
                .html(`
                    .form-control.error {
                        border-color: #f56565 !important;
                        box-shadow: 0 0 0 3px rgba(245, 101, 101, 0.1) !important;
                    }
                    .form-error {
                        animation: slideIn 0.3s ease;
                    }
                `)
                .appendTo('head');
            
            // Smooth animations for alerts
            $('.alert').hide().fadeIn(500);
            
            // Auto-hide success messages after 5 seconds
            setTimeout(function() {
                $('.alert-success').fadeOut(500);
            }, 5000);
            
            // Focus management
            $('#password').focus();
            
            // Keyboard navigation
            $(document).on('keydown', function(e) {
                if (e.key === 'Enter' && e.target.type !== 'submit') {
                    e.preventDefault();
                    const currentField = $(e.target);
                    const nextField = currentField.closest('.form-group').next('.form-group').find('input');
                    if (nextField.length) {
                        nextField.focus();
                    } else {
                        $('#resetForm').submit();
                    }
                }
            });
        });
    </script>
</body>
</html>

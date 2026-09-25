<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/form-enhancements.css') }}" type="text/css">
    <style>
        body {
            background: linear-gradient(120deg, #fdf6e3 0%, #f7f1e3 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', 'Roboto', Arial, sans-serif;
            overflow-x: hidden;
        }
        .auth-card {
            background: linear-gradient(145deg, #f8f5ee 0%, #f7f1e3 100%);
            border-radius: 2rem;
            box-shadow: 0 15px 35px rgba(191, 169, 128, 0.15), 0 5px 15px rgba(0,0,0,0.08);
            padding: 3rem 2.5rem;
            border: 2px solid #e8dbc3;
            animation: cardIn 0.8s cubic-bezier(.68,-0.55,.27,1.55);
            position: relative;
            overflow: hidden;
        }
        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #bfa980 0%, #ffe9b3 50%, #bfa980 100%);
        }
        @keyframes cardIn {
            0% { opacity: 0; transform: translateY(40px) scale(0.95); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }
        .auth-title {
            font-weight: 700;
            letter-spacing: 1px;
            color: #bfa980;
            margin-bottom: 0.5rem;
            background: linear-gradient(90deg, #bfa980 30%, #ffe9b3 60%, #bfa980 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            animation: shimmer 2.5s infinite linear;
        }
        @keyframes shimmer {
            0% { background-position: -200px 0; }
            100% { background-position: 200px 0; }
        }
        .auth-logo {
            width: 60px;
            height: 60px;
            margin-bottom: 0.5rem;
        }
        .auth-card .form-control {
            border-radius: 1.5rem;
            padding: 15px 20px 15px 2.5rem;
            background: #f7f1e3;
            border: 2px solid #e8dbc3;
            transition: all 0.3s ease;
            font-size: 16px;
            color: #5a4a3a;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .auth-card .form-control:focus {
            box-shadow: 0 0 0 3px rgba(191, 169, 128, 0.2), 0 4px 12px rgba(0,0,0,0.1);
            border-color: #bfa980;
            background: #fff;
            transform: translateY(-1px);
        }
        .auth-card .form-group:focus-within .input-icon {
            transform: translateY(-50%) translateY(-1px);
            color: #bfa980;
        }
        .auth-card .form-control::placeholder {
            color: #a68b5b;
            font-weight: 400;
        }
        .auth-card .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #bfa980;
            font-size: 1rem;
            z-index: 2;
            pointer-events: none;
            transition: all 0.3s ease;
        }
        .auth-card .form-group {
            position: relative;
            margin-bottom: 1rem;
        }
        .auth-card .input-wrapper {
            position: relative;
            display: inline-block;
            width: 100%;
        }
        .auth-card .input-wrapper .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #bfa980;
            font-size: 1rem;
            z-index: 2;
            pointer-events: none;
            transition: all 0.3s ease;
        }
        .auth-card .input-wrapper:focus-within .input-icon {
            transform: translateY(-50%) translateY(-1px);
            color: #bfa980;
        }
        .btn-primary, .btn-success {
            border-radius: 1.5rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #bfa980 0%, #ffe9b3 100%);
            border: 2px solid #bfa980;
            color: #7a5c2e;
            box-shadow: 0 4px 15px rgba(191, 169, 128, 0.25);
            padding: 12px 30px;
            font-size: 16px;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
        }
        .btn-primary:hover, .btn-success:hover {
            box-shadow: 0 6px 20px rgba(191, 169, 128, 0.35);
            background: linear-gradient(135deg, #ffe9b3 0%, #bfa980 100%);
            color: #8d6748;
            transform: translateY(-2px);
            border-color: #ffe9b3;
        }
        .btn-primary:active, .btn-success:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(191, 169, 128, 0.25);
        }
        .btn-outline-primary, .btn-outline-success {
            border-radius: 1.5rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            color: #a68b5b;
            border: 2px solid #a68b5b;
            background: transparent;
            transition: all 0.3s ease;
            padding: 10px 25px;
            font-size: 14px;
            text-transform: uppercase;
            position: relative;
        }
        .btn-outline-primary.active, .btn-outline-success.active {
            background: linear-gradient(135deg, #ffe9b3 0%, #bfa980 100%);
            color: #7a5c2e;
            border-color: #bfa980;
            box-shadow: 0 4px 15px rgba(191, 169, 128, 0.25);
            transform: translateY(-1px);
        }
        .btn-outline-primary:hover, .btn-outline-success:hover {
            background: linear-gradient(135deg, #bfa980 0%, #ffe9b3 100%);
            color: #8d6748;
            border-color: #bfa980;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(191, 169, 128, 0.2);
        }
        .border-end {
            border-right: 2px solid #f5e9da !important;
        }
        .text-link {
            color: #a68b5b;
            text-decoration: none;
            font-weight: 500;
        }
        .text-link:hover {
            text-decoration: underline;
        }
        .fade-section {
            transition: opacity 0.6s cubic-bezier(.68,-0.55,.27,1.55), transform 0.6s cubic-bezier(.68,-0.55,.27,1.55), scale 0.6s cubic-bezier(.68,-0.55,.27,1.55);
            opacity: 0;
            position: absolute;
            width: 100%;
            left: 0;
            top: 0;
            z-index: 1;
            transform: translateY(40px) scale(0.98);
            pointer-events: none;
        }
        .fade-section.active {
            opacity: 1 !important;
            position: relative !important;
            z-index: 2 !important;
            transform: translateY(0) scale(1) !important;
            pointer-events: auto !important;
        }
        
        /* Enhanced visual feedback */
        .alert {
            border-radius: 1rem;
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
        }
        .btn-close {
            background: none;
            border: none;
            font-size: 1.2rem;
            opacity: 0.7;
        }
        .btn-close:hover {
            opacity: 1;
        }
        
        /* Loading state improvements */
        .btn-loading {
            position: relative;
            color: transparent !important;
        }
        .btn-loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-right-color: transparent;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="text-center mb-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Logo" class="auth-logo">
                        <div class="auth-title h2">Welcome to Male Fashion</div>
                        <div class="text-muted mb-2">Create your account or log in to continue</div>
                    </div>
                    @php
                        $startWithRegister = (isset($showRegister) && $showRegister) 
                            || old('name') 
                            || $errors->has('name') 
                            || ($errors->has('email') && old('name'))
                            || request()->routeIs('register*');
                    @endphp
                    <div class="text-center mb-4">
                        <div class="btn-group" role="group" aria-label="Authentication tabs">
                            <button id="showLogin" class="btn btn-outline-success me-2 {{ !$startWithRegister ? 'active' : '' }}">Login</button>
                            <button id="showRegister" class="btn btn-outline-primary {{ $startWithRegister ? 'active' : '' }}">Register</button>
                        </div>
                    </div>
                    <div class="card auth-card position-relative overflow-hidden" style="min-height: 420px;">
                        <div id="formWrapper" class="position-relative">
                            <div id="registerForm" class="form-section fade-section {{ $startWithRegister ? 'active' : '' }}" style="{{ $startWithRegister ? 'display: block;' : 'display: none;' }}">
                                <form method="POST" action="/register" id="registerFormElement">
                                    <h3 class="mb-4 text-center text-success">Register</h3>
                                    @csrf
                                    <div class="mb-3 form-group">
                                        <div class="input-wrapper">
                                            <span class="input-icon"><i class="fa fa-user"></i></span>
                                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
                                        </div>
                                        @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="mb-3 form-group">
                                        <div class="input-wrapper">
                                            <span class="input-icon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                                        </div>
                                        @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="mb-3 form-group">
                                        <div class="input-wrapper">
                                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        </div>
                                        @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="mb-4 form-group">
                                        <div class="input-wrapper">
                                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-success">Register</button>
                                    </div>
                                </form>
                            </div>
                            <div id="loginForm" class="form-section fade-section {{ !$startWithRegister ? 'active' : '' }}" style="{{ !$startWithRegister ? 'display: block;' : 'display: none;' }}">
                                <form method="POST" action="/login" id="loginFormElement">
                                    <h3 class="mb-4 text-center text-success">Login</h3>
                                    @csrf
                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                            <i class="fas fa-check-circle me-2"></i>
                                            {{ session('status') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                            <i class="fas fa-check-circle me-2"></i>
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="mb-3 form-group">
                                        <div class="input-wrapper">
                                            <span class="input-icon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                                        </div>
                                        @if(!$startWithRegister && $errors->has('email'))
                                            <div class="text-danger small mt-1" style="margin-left: 2.5rem;">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-3 form-group">
                                        <div class="input-wrapper">
                                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        </div>
                                        @if(!$startWithRegister && $errors->has('password'))
                                            <div class="text-danger small mt-1" style="margin-left: 2.5rem;">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    @if ($errors->has('login_error'))
                                        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            {{ $errors->first('login_error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="mb-3 text-end">
                                        <a href="{{ route('password.request') }}" class="text-link">Forgot Password?</a>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-success">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- /card -->
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginBtn = document.getElementById('showLogin');
            const registerBtn = document.getElementById('showRegister');
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');

            function showForm(formToShow, formToHide, btnToActivate, btnToDeactivate) {
                formToHide.classList.remove('active');
                setTimeout(() => {
                    formToHide.style.display = 'none';
                    formToShow.style.display = 'block';
                    setTimeout(() => {
                        formToShow.classList.add('active');
                    }, 10);
                }, 400);
                btnToActivate.classList.add('active');
                btnToDeactivate.classList.remove('active');
            }

            loginBtn.addEventListener('click', function() {
                if (!loginForm.classList.contains('active')) {
                    showForm(loginForm, registerForm, loginBtn, registerBtn);
                }
            });
            registerBtn.addEventListener('click', function() {
                if (!registerForm.classList.contains('active')) {
                    showForm(registerForm, loginForm, registerBtn, loginBtn);
                }
            });

            // Set initial state
            const shouldStartWithRegister = {{ $startWithRegister ? 'true' : 'false' }};
            if (shouldStartWithRegister) {
                registerForm.classList.add('active');
                registerBtn.classList.add('active');
                loginForm.classList.remove('active');
                loginBtn.classList.remove('active');
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
            } else {
                loginForm.classList.add('active');
                loginBtn.classList.add('active');
                registerForm.classList.remove('active');
                registerBtn.classList.remove('active');
                registerForm.style.display = 'none';
                loginForm.style.display = 'block';
            }
            // Animate toggle buttons on click
            [loginBtn, registerBtn].forEach(btn => {
                btn.addEventListener('mousedown', function() {
                    btn.style.transform = 'scale(0.96)';
                });
                btn.addEventListener('mouseup', function() {
                    btn.style.transform = 'scale(1)';
                });
                btn.addEventListener('mouseleave', function() {
                    btn.style.transform = 'scale(1)';
                });
            });
        });
    </script>
    
    <!-- jQuery and Validation -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    {{-- Bootstrap JS (optional) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/form-enhancements.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            // Custom validation styles for auth forms
            const authValidationCSS = `
                <style>
                    .auth-card .error {
                        color: #dc3545;
                        font-size: 0.75rem;
                        margin-top: 0.25rem;
                        display: block;
                        margin-left: 2.5rem;
                    }
                    .auth-card .valid {
                        border-color: #28a745 !important;
                    }
                    .auth-card .error-input {
                        border-color: #dc3545 !important;
                    }
                    .auth-card .invalid-feedback {
                        display: block;
                        width: 100%;
                        margin-top: 0.25rem;
                        margin-left: 2.5rem;
                        font-size: 0.75rem;
                        color: #dc3545;
                        animation: slideIn 0.3s ease;
                    }
                    .auth-card .form-control.is-invalid {
                        border-color: #dc3545 !important;
                        box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.2) !important;
                    }
                    .auth-loading {
                        opacity: 0.7;
                        pointer-events: none;
                    }
                    .btn-loading {
                        position: relative;
                        color: transparent !important;
                    }
                    .btn-loading::after {
                        content: '';
                        position: absolute;
                        width: 16px;
                        height: 16px;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        margin: auto;
                        border: 2px solid #ffffff;
                        border-radius: 50%;
                        border-right-color: transparent;
                        animation: spin 1s linear infinite;
                    }
                    @keyframes spin {
                        0% { transform: rotate(0deg); }
                        100% { transform: rotate(360deg); }
                    }
                </style>
            `;
            $('head').append(authValidationCSS);
            
            // Register Form Validation
            $('#registerFormElement').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                        maxlength: 50
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 100
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 50
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#registerFormElement input[name='password']"
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your full name",
                        minlength: "Name must be at least 2 characters",
                        maxlength: "Name cannot exceed 50 characters"
                    },
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address",
                        maxlength: "Email cannot exceed 100 characters"
                    },
                    password: {
                        required: "Please enter a password",
                        minlength: "Password must be at least 8 characters",
                        maxlength: "Password cannot exceed 50 characters"
                    },
                    password_confirmation: {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
                    }
                },
                errorElement: 'span',
                errorClass: 'error',
                validClass: 'valid',
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('error-input').removeClass('valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('error-input').addClass('valid');
                },
                submitHandler: function(form) {
                    const submitBtn = $(form).find('button[type="submit"]');
                    submitBtn.addClass('btn-loading').prop('disabled', true);
                    $(form).addClass('auth-loading');
                    form.submit();
                }
            });
            
            // Login Form Validation
            $('#loginFormElement').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please enter your password",
                        minlength: "Password must be at least 8 characters"
                    }
                },
                errorElement: 'span',
                errorClass: 'error',
                validClass: 'valid',
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('error-input').removeClass('valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('error-input').addClass('valid');
                },
                submitHandler: function(form) {
                    const submitBtn = $(form).find('button[type="submit"]');
                    submitBtn.addClass('btn-loading').prop('disabled', true);
                    $(form).addClass('auth-loading');
                    form.submit();
                }
            });
            
            // Real-time validation
            $('input').on('blur keyup', function() {
                if ($(this).closest('form').length) {
                    $(this).valid();
                }
            });
            
            // Name field - only letters and spaces
            $('input[name="name"]').on('input', function() {
                this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
                // Auto-capitalize
                const words = this.value.split(' ');
                for (let i = 0; i < words.length; i++) {
                    words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
                }
                this.value = words.join(' ');
            });
            
            // Password strength indicator for register form
            $('#registerFormElement input[name="password"]').on('input', function() {
                const password = this.value;
                let strengthIndicator = $(this).siblings('.password-strength');
                
                if (password.length === 0) {
                    strengthIndicator.remove();
                    return;
                }
                
                let score = 0;
                if (password.length >= 8) score++;
                if (/[a-z]/.test(password)) score++;
                if (/[A-Z]/.test(password)) score++;
                if (/[0-9]/.test(password)) score++;
                if (/[^A-Za-z0-9]/.test(password)) score++;
                
                let strengthText = '';
                let strengthClass = '';
                
                switch (score) {
                    case 0:
                    case 1:
                        strengthText = 'Very Weak';
                        strengthClass = 'text-danger';
                        break;
                    case 2:
                        strengthText = 'Weak';
                        strengthClass = 'text-warning';
                        break;
                    case 3:
                        strengthText = 'Medium';
                        strengthClass = 'text-info';
                        break;
                    case 4:
                        strengthText = 'Strong';
                        strengthClass = 'text-success';
                        break;
                    case 5:
                        strengthText = 'Very Strong';
                        strengthClass = 'text-success';
                        break;
                }
                
                if (strengthIndicator.length === 0) {
                    $(this).after(`<small class="password-strength ${strengthClass}" style="margin-left: 2.5rem; font-size: 0.75rem;">Password Strength: ${strengthText}</small>`);
                } else {
                    strengthIndicator.attr('class', `password-strength ${strengthClass}`).text(`Password Strength: ${strengthText}`);
                }
            });
        });
    </script>
</body>
</html>

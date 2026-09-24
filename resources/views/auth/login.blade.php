<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Male Fashion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
        .form-control {
            border-radius: 1.5rem;
            padding: 15px 20px 15px 2.5rem;
            background: #f7f1e3;
            border: 2px solid #e8dbc3;
            transition: all 0.3s ease;
            font-size: 16px;
            color: #5a4a3a;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(191, 169, 128, 0.2), 0 4px 12px rgba(0,0,0,0.1);
            border-color: #bfa980;
            background: #fff;
            transform: translateY(-1px);
        }
        .form-control::placeholder {
            color: #a68b5b;
            font-weight: 400;
        }
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #bfa980;
            font-size: 1rem;
        }
        .form-group {
            position: relative;
        }
        .btn-primary {
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
        .btn-primary:hover {
            box-shadow: 0 6px 20px rgba(191, 169, 128, 0.35);
            background: linear-gradient(135deg, #ffe9b3 0%, #bfa980 100%);
            color: #8d6748;
            transform: translateY(-2px);
            border-color: #ffe9b3;
        }
        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(191, 169, 128, 0.25);
        }
        .btn-outline-primary {
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
        .btn-outline-primary:hover {
            background: linear-gradient(135deg, #bfa980 0%, #ffe9b3 100%);
            color: #8d6748;
            border-color: #bfa980;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(191, 169, 128, 0.2);
        }
        .text-link {
            color: #a68b5b;
            text-decoration: none;
            font-weight: 500;
        }
        .text-link:hover {
            text-decoration: underline;
        }
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
                        <img src="{{ asset('img/malefashion-img/logo.png') }}" alt="Male Fashion Logo" class="auth-logo">
                        <div class="auth-title h2">Welcome Back</div>
                        <div class="text-muted mb-2">Sign in to your account to continue</div>
                    </div>
                    
                    <div class="card auth-card">
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf
                            <h3 class="mb-4 text-center text-success">Login</h3>
                            
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            
                            <div class="mb-3 form-group">
                                <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="Email Address" required value="{{ old('email') }}">
                            </div>
                            
                            <div class="mb-3 form-group">
                                <span class="input-icon"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" class="text-link">Forgot Password?</a>
                            </div>
                            
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            
                            <div class="text-center">
                                <p class="mb-0">Don't have an account? 
                                    <a href="{{ route('join') }}" class="text-link">Create one here</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- jQuery and Validation -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Custom validation styles
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
                    .auth-loading {
                        opacity: 0.7;
                        pointer-events: none;
                    }
                </style>
            `;
            $('head').append(authValidationCSS);
            
            // Login Form Validation
            $('#loginForm').validate({
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
                $(this).valid();
            });
        });
    </script>
</body>
</html>

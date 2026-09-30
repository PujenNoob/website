<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify OTP</title>
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
            background: #f8f5ee;
            border-radius: 2rem;
            box-shadow: 0 8px 32px 0 rgba(191, 169, 128, 0.18);
            padding: 2.5rem 2rem;
            border: 2px solid #e8dbc3;
            animation: cardIn 0.8s cubic-bezier(.68,-0.55,.27,1.55);
        }
        @keyframes cardIn {
            0% { opacity: 0; transform: translateY(40px) scale(0.95); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }
        .auth-logo {
            width: 60px;
            height: 60px;
            margin-bottom: 0.5rem;
            display: block;
            margin-left: auto;
            margin-right: auto;
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
            text-align: center;
        }
        @keyframes shimmer {
            0% { background-position: -200px 0; }
            100% { background-position: 200px 0; }
        }
        .auth-card .form-control {
            border-radius: 1.5rem;
            padding-left: 2.5rem;
            background: #f7f1e3;
            border: 1px solid #e8dbc3;
            transition: box-shadow 0.2s;
        }
        .auth-card .form-control:focus {
            box-shadow: 0 0 0 2px #ffe9b3;
            border-color: #bfa980;
        }
        .auth-card .form-group:focus-within .input-icon {
            transform: translateY(-50%) translateY(-1px);
            color: #bfa980;
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
        .btn-success {
            border-radius: 1.5rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            background: linear-gradient(90deg, #bfa980 0%, #ffe9b3 100%);
            border-color: #bfa980;
            color: #7a5c2e;
            box-shadow: 0 2px 8px 0 rgba(191, 169, 128, 0.10);
            transition: background 0.2s, box-shadow 0.2s;
        }
        .btn-success:hover {
            background: linear-gradient(90deg, #ffe9b3 0%, #bfa980 100%);
            color: #8d6748;
            box-shadow: 0 4px 16px rgba(191, 169, 128, 0.18);
        }
        .text-danger {
            font-size: 15px;
            text-align: center;
            margin-top: 18px;
            background: #fff3cd;
            border-radius: 1rem;
            color: #856404;
            border: 1px solid #ffeeba;
            padding: 0.75rem 1rem;
            box-shadow: 0 2px 8px 0 rgba(191, 169, 128, 0.05);
            animation: fadeIn 0.6s cubic-bezier(.68,-0.55,.27,1.55);
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px) scale(0.98); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
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
                        <div class="auth-title h2">OTP Verification</div>
                        <div class="text-muted mb-2">Please enter the 6-digit OTP sent to <strong>{{ $email ?? 'your email' }}</strong></div>
                        
                        @if(session('status'))
                            <div class="alert alert-success text-center py-2 mb-3">
                                <i class="fa fa-check-circle me-1"></i> {{ session('status') }}
                            </div>
                        @endif

                        @php
                            $activeOtp = session('debug_otp') ?? ($otp ?? null);
                        @endphp

                        @if($activeOtp)
                            <div class="alert alert-info text-center py-2 px-3 mb-3 shadow-sm" style="border-radius: 1rem; border: 1px solid #b8daff;">
                                <strong>Active OTP:</strong> <code class="fs-5 px-2 py-1 bg-white rounded text-primary fw-bold" id="otpValue">{{ $activeOtp }}</code>
                                <button type="button" class="btn btn-sm btn-outline-primary ms-2" onclick="autoFillOtp('{{ $activeOtp }}')" title="Auto-fill OTP into field">
                                    <i class="fa fa-magic me-1"></i>Auto Fill
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="auth-card">
                        <form method="POST" action="/verify-otp" id="verifyOtpForm">
                            @csrf
                            <div class="form-group mb-4">
                                <span class="input-icon"><i class="fa-solid fa-key"></i></span>
                                <input type="text" name="otp" id="otpInput" class="form-control" placeholder="Enter 6-digit OTP" maxlength="6" pattern="[0-9]{6}" required autofocus>
                            </div>
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-success" id="verifyBtn">Verify OTP</button>
                            </div>
                        </form>
                        <div class="text-center d-flex justify-content-center gap-2">
                            <form method="POST" action="/resend-otp" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary btn-sm">
                                    <i class="fa fa-refresh me-1"></i>Resend OTP
                                </button>
                            </form>
                            <button type="button" class="btn btn-outline-primary btn-sm" id="fetchOtpBtn" onclick="fetchActiveOtp()">
                                <i class="fa fa-key me-1"></i>Fetch OTP
                            </button>
                        </div>
                        <div id="fetchMessage" class="text-center mt-2" style="font-size: 0.85rem; display: none;"></div>
                        @if ($errors->any())
                            <div class="text-danger mt-3">
                                @foreach ($errors->all() as $error)
                                    <p class="mb-1"><i class="fa fa-exclamation-circle me-2"></i>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function autoFillOtp(code) {
            const input = document.getElementById('otpInput');
            if (input) {
                input.value = code;
                input.focus();
            }
        }

        function fetchActiveOtp() {
            const btn = document.getElementById('fetchOtpBtn');
            const msg = document.getElementById('fetchMessage');
            btn.disabled = true;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin me-1"></i>Fetching...';
            
            fetch('/get-otp')
                .then(res => res.json())
                .then(data => {
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fa fa-key me-1"></i>Fetch OTP';
                    if (data.success && data.otp) {
                        autoFillOtp(data.otp);
                        msg.style.display = 'block';
                        msg.className = 'text-success mt-2';
                        msg.innerHTML = '<i class="fa fa-check-circle me-1"></i> OTP (' + data.otp + ') fetched and filled!';
                    } else {
                        msg.style.display = 'block';
                        msg.className = 'text-danger mt-2';
                        msg.innerHTML = '<i class="fa fa-exclamation-circle me-1"></i> ' + (data.message || 'No OTP available.');
                    }
                })
                .catch(err => {
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fa fa-key me-1"></i>Fetch OTP';
                    msg.style.display = 'block';
                    msg.className = 'text-danger mt-2';
                    msg.innerHTML = '<i class="fa fa-exclamation-circle me-1"></i> Error fetching OTP.';
                });
        }
    </script>
</body>
</html>

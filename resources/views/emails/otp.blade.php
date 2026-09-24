<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification - Male Fashion</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .email-header {
            background: linear-gradient(135deg, #bfa980 0%, #ffe9b3 100%);
            padding: 30px;
            text-align: center;
            color: #7a5c2e;
        }
        .email-header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }
        .email-body {
            padding: 40px 30px;
            text-align: center;
        }
        .otp-code {
            background: #f8f9fa;
            border: 2px dashed #bfa980;
            border-radius: 10px;
            padding: 30px;
            margin: 30px 0;
            font-size: 36px;
            font-weight: bold;
            color: #bfa980;
            letter-spacing: 8px;
            font-family: 'Courier New', monospace;
        }
        .otp-instructions {
            background: #e8f4f8;
            border-left: 4px solid #bfa980;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .otp-instructions h3 {
            margin-top: 0;
            color: #bfa980;
        }
        .otp-instructions ul {
            text-align: left;
            margin: 10px 0;
        }
        .expiry-warning {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .email-footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #6c757d;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #bfa980 0%, #ffe9b3 100%);
            color: #7a5c2e;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            margin: 20px 0;
        }
        .security-note {
            background: #d1ecf1;
            border: 1px solid #bee5eb;
            color: #0c5460;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>🔐 OTP Verification</h1>
            <p style="margin: 10px 0 0 0; font-size: 16px;">Male Fashion Account Registration</p>
        </div>
        
        <div class="email-body">
            <h2 style="color: #bfa980; margin-bottom: 20px;">Your Verification Code</h2>
            <p>Thank you for registering with Male Fashion! To complete your registration, please use the following One-Time Password (OTP):</p>
            
            <div class="otp-code">
                {{ $otp }}
            </div>
            
            <div class="otp-instructions">
                <h3>📋 How to use this code:</h3>
                <ul>
                    <li>Copy the 6-digit code above</li>
                    <li>Return to the verification page</li>
                    <li>Enter the code in the OTP field</li>
                    <li>Click "Verify OTP" to complete registration</li>
                </ul>
            </div>
            
            <div class="expiry-warning">
                <strong>⏰ Important:</strong> This code will expire in <strong>5 minutes</strong> for security reasons.
            </div>
            
            <div class="security-note">
                <strong>🔒 Security Note:</strong> Never share this code with anyone. Male Fashion will never ask for your OTP via phone or email.
            </div>
            
            <p>If you didn't request this code, please ignore this email.</p>
        </div>
        
        <div class="email-footer">
            <p><strong>Male Fashion</strong><br>
            Your trusted fashion partner</p>
            <p style="font-size: 12px; margin-top: 15px;">
                This is an automated message. Please do not reply to this email.
            </p>
        </div>
    </div>
</body>
</html>

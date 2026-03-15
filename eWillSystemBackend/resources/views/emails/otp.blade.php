<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP for Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
            border-bottom: 2px solid #f1f1f1;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .footer {
            text-align: center;
            padding: 10px 0;
            font-size: 0.9em;
            color: #666;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>OTP for Verification</h1>
        </div>
        <div class="content">
            <p>Your OTP for email verification is: <strong>{{ $otp }}</strong></p>
            <p>Please do not share this code with anyone. It will expire soon.</p>
        </div>
        <div class="footer">
            <p>If you did not request this OTP, please ignore this email.</p>
            <p>Need help? <a href="{{ url('/contact') }}">Contact Support</a></p>
        </div>
    </div>
</body>
</html>

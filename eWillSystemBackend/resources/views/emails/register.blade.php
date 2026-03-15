<!DOCTYPE html>
<html>
<head>
  <title>Your Login Credentials</title>
</head>
<body style="text-align: center;">
  <h1>Hello {{ $full_name }},</h1>
  <p>Thank you for registering on eWillSystem.</p>
  <p>Your default password is: <strong>{{ $default_password }}</strong></p>
  <p>You can use this password to log in and change it to something more secure later.</p>
  <p>Best regards,<br>eWillSystem Team</p>
</body>
</html>

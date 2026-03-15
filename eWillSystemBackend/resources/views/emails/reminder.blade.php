<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Reminder</title>
</head>
<body>
    <h1>Dear {{ $user->name }},</h1>
    <p>
        This is a friendly reminder that your subscription fee is still unpaid.
        Please make the payment to continue enjoying our services.
    </p>
    <p>
        If you've already made the payment, kindly disregard this message.
    </p>
    <p>Best regards,</p>
    <p><strong>eWillSystem Team</strong></p>
</body>
</html>

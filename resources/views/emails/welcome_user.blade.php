<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Welcome to Our Appointment System</title>
</head>

<body>
    <h2>Hello {{ $name }},</h2>
    <p>Thank you for booking an appointment with us. An account has been created for you so you can track your appointment status.</p>

    <p><strong>Login Details:</strong></p>
    <ul>
        <li>Email: {{ $email }}</li>
        <li>Password: {{ $password }}</li>
    </ul>

    <p>Please login and change your password.</p>
    <p>You can log in here: <a href="{{ url('/login') }}">{{ url('/login') }}</a></p>


    <p>Best regards,<br>Healthcare Team</p>
</body>

</html>
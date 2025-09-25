<!DOCTYPE html>
<html>

<head>
    <title>Appointment Status</title>
</head>

<body>
    <h4>Dear {{ $name }},</h4>
    <h4>
        Your appointment has been
        @if(strtolower($status) == 'approved')
        <strong style="color: green;">{{ $status }}</strong>.
        @elseif(strtolower($status) == 'rejected')
        <strong style="color: red;">{{ $status }}</strong>.
        @else
        <strong style="color: orange;">{{ $status }}</strong>.
        @endif
    </h4>

    @if($status == 'Approved')
    <p>We look forward to seeing you at your scheduled time!</p>
    @else
    <p>Unfortunately, your appointment request has been rejected.</p>
    @endif

    <p>Thank you,</p>
    <p>Our Team</p>
</body>

</html>
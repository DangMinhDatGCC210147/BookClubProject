<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User Registered</title>
</head>
<body>
    <p>Hello Leaders,</p>
    
    <p>A new user has registered:</p>
    <ul>
        <li>Email: {{ $user->email }}</li>
        <li>Name: {{ $user->name }}</li>
    </ul>

    <p>Regards,</p>
    <p>Your information technology techniques, Dustin</p>
</body>
</html>

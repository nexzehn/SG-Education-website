<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border: 1px solid #ccc; border-radius: 8px; padding: 20px;">
        
        <!-- Logo -->
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="{{ url('/') }}">
                <img  src="https://WeGrow ITmedia.com/assets/images/logo.png"  alt="WeGrow IT Logo" title=""  style="height: 60px;">
            </a>
        </div>

        <h2 style="color: #012960;">New Contact Message</h2>

       <p><strong>Name:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
        <p><strong>Services:</strong> {{ $data['services'] }}</p>
        <p><strong>Message:</strong><br>{{ $data['message'] }}</p>
        <div style="margin-top: 30px; color: #888;">
            <small>This email was sent via WeGrow IT's contact form.</small>
        </div>
    </div>
</body>
</html>

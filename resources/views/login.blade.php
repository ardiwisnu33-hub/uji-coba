<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; padding:90px;">
    <div class="container" style="width: 350px; background: white; padding: 35px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
        <h2 style="text-align: center; margin-bottom: 25px; color: #333;">Login</h2>
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="email" style="font-size: 14px; font-weight: bold; color: #555;">Email:</label>
                <input type="email" style="width: 100%; padding: 10px; margin-top: 6px; border-radius: 6px; border: 1px solid #ccc;" id="email" name="email" required>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="password" style="font-size: 14px; font-weight: bold; color: #555;">Password:</label>
                <input type="password" style="width: 100%; padding: 10px; margin-top: 6px; border-radius: 6px; border: 1px solid #ccc;" id="password" name="password" required>
            </div>
            <div style="display: flex; justify-content: center; align-items: center;">
                <button type="submit" style="width: 90%; padding: 10px; margin-top: 6px; border-radius: 6px; border: 1px solid #3042a7; cursor: pointer;">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    
</head>
<body>

    <main>
        <section>
            <h1>Welcome to our Website :{{ config('app.name') }}</h1>
            <h2>This is a test email</h2>
            <h2>{{ $data['title'] }}</h2>
            <h2>{{ $data['message'] }}</h2>
            <p style="color: red">please do no replay!! . </p>
            <h2>{{ $data['session_title'] }}</h2>

        </section>
    </main>

    <footer>
        <p>&copy; 2024 Your Site Name. All rights reserved.</p>
    </footer>

    
</body>
</html>
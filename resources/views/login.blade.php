<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Login</h2>
    <form action="/login" method="POST">
        @if (session()->has('error'))
            <p style="color:red">{{ session()->get('error') }}</p>
        @endif
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            @csrf
            <input type="submit" value="Login">
        </div>
    </form>
</body>
</html>
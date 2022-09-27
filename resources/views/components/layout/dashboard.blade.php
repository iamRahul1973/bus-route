<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    @livewireStyles
</head>
<body>
    <div>
        <h3>Navigation</h3>
        <ul>
            <li><a href="{{ route('admin.destinations') }}">Destinations</a></li>
            <li><a href="{{ route('admin.routes') }}">Routes</a></li>
            <li><a href="{{ route('admin.buses') }}">Bus</a></li>
            <li><a href="#">Bookings</a></li>
        </ul>
    </div>
    {{ $slot }}
    <footer>Here goes the footer.</footer>
    @livewireScripts
</body>
</html>
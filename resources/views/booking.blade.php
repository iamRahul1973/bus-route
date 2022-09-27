<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking</title>
    @livewireStyles
</head>
<body>
    <h1>Book your seats</h1>
    <livewire:booking :destinations="$destinations" />
    @livewireScripts
</body>
</html>
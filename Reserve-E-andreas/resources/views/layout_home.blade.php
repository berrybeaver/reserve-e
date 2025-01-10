<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/js/app.js')
    @yield('links')
</head>
<body>
<!-- Header -->
<div class="header">
    <h1 id="header-title">SmartLab EV-Charging</h1>
    <button id="backButton" class="hidden">⬅ Back</button>
</div>
@yield('page')
<!-- Bottom-Navigation-->
<div class="bottom-nav">
    <a href="#location">
        <span role="img" aria-label="location">📍</span>
        <span>Location</span>
    </a>
    <a href="{{route('reservation')}}">
        <span role="img" aria-label="reservation">📅</span>
        <span>Reservation</span>
    </a>
    <a href="#profile">
        <span role="img" aria-label="user">👤</span>
        <span>Profile</span>
    </a>
</div>
</body>
</html>

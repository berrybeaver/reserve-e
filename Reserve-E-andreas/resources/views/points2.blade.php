<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Points</title>
    @vite('resources/js/app.js')
</head>
<body>
    <div class="header">
        <a href="/home" class="back-button">&larr; Zurück</a>
        <h1>Meine Punkte</h1>
    </div>
    <div id="pointsPage">
        <div class="points-box" id="userPoints">{{$points}}</div>
        <button class="points-button" id="dailyBonus">TÄGLICHER BONUS BEANSPRUCHEN</button>
        <a href="{{ route('redeem') }}" class="points-button">MEINE PUNKTE EINLÖSEN</a>
    </div>

    <!-- Include the compiled points.js -->
    <script src="{{ asset('js/points2.js') }}"></script>
</body>
</html>

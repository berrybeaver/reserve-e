<!-- resources/views/points.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Points</title>
    @vite('resources/js/app.js')
</head>
<body>
    <div class="header">
        <a href="/home" class="back-button">&larr; Zurück</a>
        <h1>Meine Punkte</h1>
    </div>

    <div id="pointsPage">
        <div class="points-box" id="userPoints">hier wird gezeigt</div>
        <button class="points-button" id="dailyBonus">TÄGLICHER BONUS BEANSPRUCHEN</button>
        <a href="{{ route('redeem') }}" class="points-button">MEINE PUNKTE EINLÖSEN</a>
    </div>

    <div id="bonusModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Täglicher Bonus erfolgreich beansprucht!</p>
        </div>
    </div>

   <!-- Pass the route URL to JavaScript -->
    <script>
        const pointsDataUrl = "{{ route('points.data') }}";
    </script>

    <!-- Include the compiled points.js -->
    <script src="{{ asset('js/points.js') }}"></script>
</body>
</html>

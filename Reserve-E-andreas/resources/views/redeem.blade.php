<!-- resources/views/redeem.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redeem Points</title>
    @vite('resources/js/app.js')
</head>
<body>
    <div class="header">
        <a href="{{ route('points') }}" class="back-button">&larr; Zurück</a>
        <h1>Meine Punkte Einlösen</h1>
        <div class="user-points">
            <span>Your Points: {{ $points }}</span>
        </div>
    </div>

    <div id="redeemPage">
    @foreach ($coupons as $coupon)
        <div class="redeem-item">
            <div class="redeem-item-info">
                <span>{{ $coupon->name }}</span>
                <span>{{ $coupon->points_required }} Punkte</span>
            </div>
            <button class="redeem-button" data-coupon-id="{{ $coupon->id }}">EINLÖSEN</button>
        </div>
    @endforeach
</div>
</body>
</html>

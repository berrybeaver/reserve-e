@extends('layout_home')
@section('title')
    SmartLab Charging Solutions
@endsection

@section('links')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
@endsection

@section('page')
<!-- Home Page -->
<div id="homePage" class="view">
    <!-- Search Bar -->
    <div class="search-container">
        <input type="text" id="search-bar" placeholder="Search for charging stations...">
        <button id="search-button">🔍</button>
    </div>

    <!-- Main Container -->
    <div class="container">
        <a id="myPointsButton" href="{{route('points')}}">
            <span role="img" aria-label="Points">💎</span> Points
        </a>
        <button id="myQuestsButton">
            <span role="img" aria-label="Quests">🎯</span> Quests
        </button>
        <button id="logoutButton">
            <span role="img" aria-label="History">🎖</span> Badges
        </button>
    </div>
</div>

<!-- Points Page -->
<div id="pointsPage" class="view hidden">
    <h2>Meine Punkte</h2>
    <div class="points-box" id="userPoints">0 P</div>
    <button class="points-button" id="claimBonusButton">TÄGLICHER BONUS BEANSPRUCHEN</button>
    <button class="points-button" id="redeemPointsButton">MEINE PUNKTE EINLÖSEN</button>
</div>

<!-- Redeem Points Page -->
<div id="redeemPage" class="view hidden">
    <h2>PUNKTE EINLÖSEN</h2>
    <div class="redeem-container">
        <div class="redeem-item">
            <h3>BEISPIEL RESTAURANT</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            <button class="redeem-button">BESTÄTIGEN</button>
        </div>
        <div class="redeem-item">
            <h3>BEISPIEL RESERVIERUNG PRIO</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            <button class="redeem-button">BESTÄTIGEN</button>
        </div>
        <div class="redeem-item">
            <h3>BEISPIEL 3</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            <button class="redeem-button">BESTÄTIGEN</button>
        </div>
        <div class="redeem-item">
            <h3>BEISPIEL 4</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            <button class="redeem-button">BESTÄTIGEN</button>
        </div>
    </div>
</div>

<!-- Bonus Modal -->
<div id="bonusModal" class="modal hidden">
    <div class="modal-content">
        <span class="close-button" id="closeModalButton">✖</span>
        <h3>Täglicher Login Bonus</h3>
        <img src="C:\Users\saima\OneDrive\Desktop\1212.jpg" alt="Bonus Wheel" class="bonus-icon">
        <p>+50 P</p>
    </div>
</div>
@endsection

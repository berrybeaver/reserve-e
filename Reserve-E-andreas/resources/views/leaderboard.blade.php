<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leaderboard</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #121212; /* Dark background */
      color: #f5f5f5; /* White text */
    }

    .leaderboard {
      max-width: 700px;
      margin: 40px auto;
      background-color: #1f1f1f;
      border-radius: 10px;
      box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      margin-top: 80px;
    }

    .leaderboard-header {
      background-color: #000000;
      color: #ffffff;
      padding: 20px;
      text-align: center;
      font-size: 24px;
      font-weight: bold;
    }

    .back-button {
      position: absolute;
      top: 20px;
      left: 20px;
      background-color: #f5f5f5;
      color: #121212;
      padding: 8px 15px;
      font-size: 14px;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
    }

    .back-button:hover {
      background-color: #d4d4d4;
    }

    .podium {
      display: flex;
      justify-content: center;
      align-items: flex-end;
      padding: 30px;
      background-color: #333;
    }

    .podium .position {
      text-align: center;
      margin: 0 10px;
    }

    .podium .first {
      order: 0;
      height: 200px;
      background-color: #FFD700;
      border-radius: 10px;
      width: 100px;
      padding: 10px;
      color: #121212;
    }

    .podium .second {
      order: 1;
      height: 170px;
      background-color: #C0C0C0;
      border-radius: 10px;
      width: 100px;
      padding: 10px;
      color: #121212;
    }

    .podium .third {
      order: 2;
      height: 140px;
      background-color: #CD7F32;
      border-radius: 10px;
      width: 100px;
      padding: 10px;
      color: #121212;
    }

    .podium img {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      margin-bottom: 10px;
      border: 2px solid #f5f5f5;
    }

    .podium .name {
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .podium .points {
      font-size: 14px;
    }

    .leaderboard-list {
      padding: 20px;
    }

    .leaderboard-list .entry {
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid #333;
      padding: 10px 0;
    }

    .leaderboard-list .entry img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }

    .leaderboard-list .entry .details {
      flex: 1;
      margin-left: 15px;
    }

    .leaderboard-list .entry .details .name {
      font-weight: bold;
      font-size: 16px;
    }

    .leaderboard-list .entry .details .points {
      font-size: 14px;
      color: #aaa;
    }

    .leaderboard-list .entry .position {
      font-size: 16px;
      font-weight: bold;
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <a href="/home" class="back-button">Back to Home</a>

  <div class="leaderboard">
    <div class="leaderboard-header">Leaderboard</div>
    <!-- Podium Section -->
    <div class="podium">
        @if($podium->count() > 0)
            @foreach($podium as $index => $entry)
                <div class="position {{ $index === 0 ? 'first' : ($index === 1 ? 'second' : 'third') }}">
                    <img src="{{ asset('images/' . $entry->user_id . '.png') }}" alt="{{ $entry->name }} {{ $entry->lastname }}">

                    <div class="name">{{ $entry->name }} <!--{{ $entry->lastname }}--></div>
                    <div class="points">Points: {{ $entry->points }}</div>
                </div>
            @endforeach
        @endif
    </div>
    <!-- Leaderboard List -->
    <div class="leaderboard-list">
        @php $rank = 4; @endphp
        @foreach($remaining as $entry)
            <div class="entry">
                <div class="position">{{ $rank++ }}</div>
                <div class="details">
                    <img src="{{ asset('images/' . $entry->user_id . '.png') }}" alt="{{ $entry->name }} {{ $entry->lastname }}">
                    <div class="name">{{ $entry->name }} <!--{{ $entry->lastname }}--></div>
                    <div class="points">Points: {{ $entry->points }}</div>
                </div>
            </div>
        @endforeach
    </div>

  </div>
</body>
</html>


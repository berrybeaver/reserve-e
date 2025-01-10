<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meine Ziele</title>
  <style>
    body {
      background: url(images/Peechedekho.jpg) center/cover no-repeat;
      color: black;
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      background-image: linear-gradient(to bottom, rgba(40, 167, 69, 0.1), rgba(40, 167, 69, 0));
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    body::after {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.801);
      backdrop-filter: blur(8px);
      z-index: -1;
    }

    .header {
      background-color: #fff;
      width: 100%;
      padding: 20px;
      text-align: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      position: fixed;
      top: 0;
      left: 0;
      z-index: 10;
    }

    .header h1 {
      margin: 0;
      font-size: 20px;
    }

    .back-button {
      position: absolute;
      left: 15px;
      background-color: #000200;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      font-size: 16px;
    }

    .container {
      margin-top: 100px;
      padding: 20px;
      width: 100%;
      max-width: 600px;
    }

    .monthly-goals {
      background-color: #fff;
      border: 2px solid #000802;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .monthly-goals h2 {
      color: #333;
    }

    .monthly-goals p {
      color: #666;
    }

    .time-remaining {
      margin-top: 10px;
      font-size: 16px;
      color: #28a745;
    }

    .daily-tasks h2 {
      font-size: 18px;
      margin-bottom: 10px;
      color: #333;
    }

    .task {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      background: #fff;
      border: 2px solid #000501;
      border-radius: 8px;
      padding: 10px 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 15px;
      position: relative;
    }

    .task span {
      font-size: 20px;
      margin-bottom: 5px;
      color: #000301;
    }

    progress {
      width: 100%;
      height: 10px;
      border-radius: 5px;
      margin-top: 10px;
    }

    progress::-webkit-progress-bar {
      background-color: #e0e0e0;
    }

    progress::-webkit-progress-value {
      background-color: #000501;
    }

    .progress-counter {
      position: absolute;
      top: 50%;
      right: -60px;
      transform: translateY(-50%);
      padding: 5px 15px;
      background-color: #000702;
      color: white;
      border-radius: 50px;
      font-size: 14px;
      font-weight: bold;
    }

    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: #fff;
      box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
      display: flex;
      justify-content: space-around;
      padding: 15px 0;
    }

    .bottom-nav a {
      color: #333;
      text-decoration: none;
      font-size: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .bottom-nav a span {
      font-size: 14px;
      color: #000200;
    }
  </style>
</head>
<body>
  <div class="header">
    <a href="{{ route('basePage') }}" class="back-button">&larr; Zurück</a>
    <h1>Meine Ziele</h1>
  </div>
  
  <div class="container">
    <section class="monthly-goals">
      <h2>Monatsziele</h2>
      <p>{{ $monthlyGoal }}</p>
      <div class="time-remaining">
        <span role="img" aria-label="calendar">📅</span> {{ $daysLeft }} Tage übrig
      </div>
    </section>

    <section class="daily-tasks">
      <h2>Tägliche Aufgaben</h2>
      
      @foreach($tasks as $task)
        <div class="task" data-id="{{ $task['id'] }}">
          <span role="img" aria-label="{{ $task['icon'] }}">{{ $task['icon'] }}</span> {{ $task['label'] }}
          <div class="progress-counter">{{ $task['progress'] }}/{{ $task['max'] }}</div>
          <progress max="{{ $task['max'] }}" value="{{ $task['progress'] }}"></progress>
        </div>
      @endforeach
    </section>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const tasks = document.querySelectorAll(".task");

      tasks.forEach((task) => {
        const progress = task.querySelector("progress");
        const progressCounter = task.querySelector(".progress-counter");

        task.addEventListener("click", () => {
          if (progress.value < progress.max) {
            progress.value++;
            progressCounter.textContent = `${progress.value}/${progress.max}`; // Update the counter
            if (progress.value === progress.max) {
              task.style.borderColor = "#ffc107"; // Highlight the task when complete
              alert("Aufgabe abgeschlossen! 🎉");
            }
          }
        });
      });
    });
  </script>
</body>
</html>

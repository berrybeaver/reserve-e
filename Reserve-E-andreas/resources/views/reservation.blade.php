<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Reservations</title>
  <style>
      /* Responsive Styles */
      @media (max-width: 768px) {
          header h1 {
              font-size: 20px;
          }

          .back-button {
              font-size: 14px;
          }

          table th, table td {
              padding: 10px;
          }

          .action-buttons {
              flex-direction: column;
              gap: 5px;
          }

          .popup {
              width: 90%;
          }
      }

      @media (max-width: 480px) {
          header h1 {
              font-size: 18px;
              margin-left: 100px;
          }

          .back-button {
              font-size: 12px;
          }

          .popup {
              width: 80%;
          }
      }
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #000;
      color: #fff;
    }
    header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #111;
    }

    header h1 {
    margin: 0;
    font-size: 24px;
    text-align: center;
    flex-grow: 1;
    }

    .back-button {
    background-color: #fff;
    color: #000;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    transition: transform 0.2s, background-color 0.2s;
    position: absolute;
    left: 20px;
    }

    .back-button:hover {
    transform: scale(1.1);
    background-color: #444;
    color: #fff;
    }


    .container {
      padding: 20px;
    }

    .table-container {
      margin-top: 20px;
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin: 0 auto;
      background-color: #111;
      color: #fff;
      text-align: left;
    }

    table th, table td {
      padding: 15px;
      border: 1px solid #333;
    }

    table th {
      background-color: #222;
    }

    table tr:nth-child(odd) {
      background-color: #1a1a1a;
    }

    table tr:nth-child(even) {
      background-color: #2a2a2a;
    }

    .action-buttons {
      display: flex;
      gap: 10px;
    }

    .action-buttons button {
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
      font-weight: bold;
      transition: transform 0.2s;
    }

    .edit-button {
      background-color: #007BFF;
      color: #fff;
    }

    .edit-button:hover {
      transform: scale(1.1);
      background-color: #0056b3;
    }

    .delete-button {
      background-color: #FF4C4C;
      color: #fff;
    }

    .delete-button:hover {
      transform: scale(1.1);
      background-color: #c80000;
    }

    .reservation {
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 10px;
      margin: 10px 0;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .no-reservations {
      text-align: center;
      font-size: 18px;
      margin-top: 20px;
    }

    /* Popup Form Styles */
    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #222;
      border: 1px solid #333;
      padding: 20px;
      border-radius: 10px;
      z-index: 1000;
      width: 300px;
    }

    .popup h2 {
      margin-top: 0;
    }

    .popup input[type="time"] {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      margin-bottom: 20px;
      background-color: #111;
      border: 1px solid #333;
      color: #fff;
      border-radius: 5px;
    }

    .popup button {
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
      font-weight: bold;
    }

    .popup .save-button {
      background-color: #007BFF;
      color: #fff;
    }

    .popup .save-button:hover {
      background-color: #0056b3;
    }

    .popup .cancel-button {
      background-color: #FF4C4C;
      color: #fff;
      margin-left: 10px;
    }

    .popup .cancel-button:hover {
      background-color: #c80000;
    }

    /* Overlay for Popup */
    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      z-index: 999;
    }
  </style>
</head>
<body>

<header>
  <a href="/home" class="back-button">Back to Home</a>
  <h1>My Reservations</h1>
</header>

<div class="container">
  <div class="table-container">
    <table>
    <thead>
        <tr>
            <th>#</th>
            <th>Reservation Name</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        @if($reservations->isEmpty())
            <tr>
                <td colspan="4" style="text-align: center;">No reservations found.</td>
            </tr>
        @else
            @foreach ($reservations as $index => $reservation)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $reservation->chargingStation->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($reservation->date_of_reservation)->format('Y-m-d') }}</td>
                    <td>{{ \Carbon\Carbon::parse($reservation->date_of_reservation)->format('H:i') }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

  </div>
</div>

<!-- Popup for Editing Time -->
<div class="overlay" id="overlay" style="display: none;"></div>
<div class="popup" id="edit-popup" style="display: none;">
  <h2>Edit Time</h2>
  <form method="POST" action="edit_time.php">
    <input type="hidden" name="id" id="edit-id">
    <input type="time" name="time" id="edit-time">
    <button type="submit" class="save-button">Save</button>
    <button type="button" class="cancel-button" onclick="closePopup()">Cancel</button>
  </form>
</div>

<script>
  function openPopup(id, time) {
    document.getElementById("edit-id").value = id;
    document.getElementById("edit-time").value = time;
    document.getElementById("overlay").style.display = "block";
    document.getElementById("edit-popup").style.display = "block";
  }

  function closePopup() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("edit-popup").style.display = "none";
  }
</script>

</body>
</html>

<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ReservationController extends Controller
{
    public function index()
    {
        // Check if the user is logged in using Laravel's session helper
        if (Session::has('loggedin') && Session::get('loggedin') === true) {
            $userId = Session::get('user_id'); // Get the logged-in user's ID from the session
            $reservations = Reservation::where('user_id', $userId)
                ->with('chargingStation')
                ->orderBy('date_of_reservation', 'desc')
                ->get();
            return view('reservation', compact('reservations'));
        }
        else{
            // Retrieve the error message from the session (if any)
            $errormsg_login = Session::pull('errorLogin', ''); // Pull removes the key after retrieval
            return view('login', ['error' => $errormsg_login]);
        }
    }
}

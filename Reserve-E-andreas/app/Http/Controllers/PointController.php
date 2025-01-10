<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;




class PointController extends Controller
{
    public function index(){
        // Debug session data to ensure the correct user data is present
        //dd(Session::all()); // This will show the session data for debugging
        if (Session::has('loggedin') && Session::get('loggedin') === true) {
            $user = Session::get('user');// Get user data from the session
            if ($user && isset($user['points'])) {
                $points = $user['points'];
            } else {
                $points = 0; // Default to 0 if points are not found
            }
            // Pass the points to the view
            return view('points2', compact('points'));
        }
        else{
            $errormsg_login = Session::pull('errorLogin', ''); // Retrieve the error message from the session
            return view('login',['error' => $errormsg_login]);
        }
    }

    // Method to handle the daily bonus claim
    public function claimBonus()
    {
        if (Session::has('loggedin') && Session::get('loggedin') === true) {
            $user = Session::get('user');
            $userId = $user['id'];
            // Fetch `last_claimed` from the database
            $lastClaimed = DB::table('users')->where('id', $userId)->value('last_claimed');

            // Parse `last_claimed` as a Carbon instance if it's not null
            $lastClaimed = $lastClaimed ? Carbon::parse($lastClaimed, config('app.timezone')) : null;
            // Debug logging
            logger()->info('Last claimed: ', ['last_claimed' => $lastClaimed]);
            logger()->info('Diff in days: ', ['diff' => $lastClaimed ? now()->diffInDays($lastClaimed) : 'N/A']);
            // Check if the user can claim the bonus
            if ($lastClaimed && now()->diffInDays($lastClaimed) <= -1) {
                // Update the database
                DB::table('users')
                    ->where('id', $userId)
                    ->update([
                        'points' => $user['points'] + 50, // Add 50 points
                        'last_claimed' => now(),
                    ]);
                // Update the session
                $user['points'] += 50;
                $user['last_claimed'] = now();
                Session::put('user', $user);
                return response()->json(['message' => 'Daily bonus claimed!']);
            } else {
                return response()->json(['message' => 'Bonus already claimed today.'], 400);
            }
        } else {
            return response()->json(['message' => 'Unauthorized.'], 401);
        }
    }
}

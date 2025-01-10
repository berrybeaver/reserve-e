<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        // Query to get user details, badge names, and counter
        $leaderboard = DB::table('badges_per_user')
            ->join('users', 'badges_per_user.user_id', '=', 'users.id')
            ->join('badges', 'badges_per_user.badge_id', '=', 'badges.id')
            ->select(
                'users.id as user_id',
                'users.name',
                'users.lastname',
                'users.points',
                'badges.name as badge_name',
                'badges_per_user.counter_for_fulfillment'
            )
            ->orderBy('users.points', 'desc')
            ->get();
        // Prepare data for the podium and the rest of the leaderboard
        $podium = $leaderboard->take(3);
        $remaining = $leaderboard->skip(3);

        return view('leaderboard', compact('podium', 'remaining'));
    }
}


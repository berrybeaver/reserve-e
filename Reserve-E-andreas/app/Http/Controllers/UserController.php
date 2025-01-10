<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showPoints()
    {
        $users = User::select('id', 'name', 'lastname', 'points')->get(); // Fetch only the necessary fields
        return view('point', compact('users'));
    }
}

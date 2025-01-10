<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class HomeController extends Controller
{
    //localhost/home
    public function index(){
        if (Session::has('loggedin') && Session::get('loggedin') === true) {
            return view('homepage');
        }
        else{
            $errormsg_login = Session::pull('errorLogin', ''); // Retrieve the error message from the session
            return view('login',['error' => $errormsg_login]);
        }
    }

    public function login(Request $request){
        $errormsg_login = $_SESSION['errorLogin'] ?? '';
        unset($_SESSION['fehlermeldung']);
        return view('login',['error' => $errormsg_login]);
    }

    /*public function login_verification(Request $request){
        $email = trim($_GET['email']??'');
        $password = trim($_GET['password']??'');
        $dbpassword = DB::table('users')->where('email', $email)->value('password');
        if($dbpassword == $password){
            $_SESSION['loggedin'] = true;
            return view('homepage');
        }
        else{
            $_SESSION['errorLogin']="Wrong password or email!";
            $errormsg_login = "Wrong password or email!";
            $_SESSION['loggedin'] = false;
            return view('login',['error' => $errormsg_login]);
        }

    }*/
    public function login_verification(Request $request)
    {
        $email = trim($request->input('email'));
        $password = trim($request->input('password'));
        $user = User::where('email', $email)->first(); // Use User model to find by email

        if ($user && $user->password == $password) {
            // Use Laravel's session helper to set loggedin status
            Session::put('loggedin', true);
            Session::put('user_id', $user->id);
            // Store user details including points in the session
            Session::put('user', $user->toArray());

            return redirect('/home');
        } else {
            // Set the error message in Laravel's session
            Session::put('errorLogin', 'Wrong password or email!');
            return redirect('/login');
        }
    }
    public function logout(Request $request)
    {
        // Clear all session data
        Session::flush(); // This removes all session data

        // Regenerate session ID for security
        $request->session()->regenerate();

        // Optionally redirect to the login page or another route
        return redirect('/login')->with('success', 'You have been logged out.');
    }
}

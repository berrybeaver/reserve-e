<?php

use App\Http\Controllers\CouponController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLoggedIn;

Route::get('/', function () {
    return view('welcome');
});
//home & login/logout
Route::get('/home', [HomeController::class, 'index'])->middleware(CheckLoggedIn::class);
Route::get('/login', [HomeController::class, 'login']);
Route::get('/login-verification', [HomeController::class, 'login_verification']);
Route::get('/logout', [HomeController::class, 'logout']);

//reservation
Route::get('/reservation', [ReservationController::class, 'index'])->middleware(CheckLoggedIn::class)->name('reservation');
Route::get('/leaderboard', [LeaderboardController::class, 'index']);

//points
Route::get('/points2', [PointController::class, 'index'])->middleware(CheckLoggedIn::class)->name('points');
// Route for claiming daily bonus
Route::post('/points2/claim-bonus', [PointController::class, 'claimBonus'])->middleware(CheckLoggedIn::class)->name('points.claim-bonus');
//coupon
Route::get('/redeem', [CouponController::class, 'showRedeemPage'])->name('redeem');
Route::post('/redeem/coupon', [CouponController::class, 'redeemCoupon'])->name('redeem.coupon');


//mayssen code
Route::get('/quests', function () {
    $monthlyGoal = 'Complete the first challenge';
    $daysLeft = 10;
    $tasks = [
        ['id' => 1, 'icon' => '✔️', 'label' => 'Task 1', 'progress' => 5, 'max' => 10],
        ['id' => 2, 'icon' => '✔️', 'label' => 'Task 2', 'progress' => 2, 'max' => 10],
    ];

    return view('quests', compact('monthlyGoal', 'daysLeft', 'tasks'));
});

Route::get('/base-page', function () {
    $filePath = base_path('Base Page/basePage.html');  // Full path to the HTML file
    return response()->file($filePath);  // Return the file directly
})->name('basePage');  // Naming the route
//Route::get('redeem', function () {return view('redeem');})->name('redeem');

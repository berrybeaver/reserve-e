<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function showRedeemPage()
    {
        if (Session::has('loggedin') && Session::get('loggedin') === true) {
            // Fetch all coupons from the database
            $coupons = Coupon::all();
            // Retrieve user points from the session
            $points = Session::get('user')['points'] ?? 0;
            // Pass the coupons to the view
            return view('redeem', compact('coupons','points'));
        } else{
            $errormsg_login = Session::pull('errorLogin', ''); // Retrieve the error message from the session
            return view('login',['error' => $errormsg_login]);
        }
    }

    //method to handle redeem coupon
    public function redeemCoupon(Request $request)
    {
        // Get user data from session
        if (!Session::has('user') || !Session::get('loggedin')) {
            return response()->json(['message' => 'Unauthorized.'], 401);
        }

        $user = Session::get('user');
        $userId = $user['id'];

        // Validate the coupon_id sent from the request
        $couponId = $request->input('coupon_id');
        $coupon = DB::table('coupons')->where('id', $couponId)->first();

        if (!$coupon) {
            return response()->json(['message' => 'Coupon not found.'], 404);
        }

        // Check if the user has enough points
        if ($user['points'] < $coupon->points_required) {
            return response()->json(['message' => 'Not enough points.'], 400);
        }

        // Deduct points and save the coupon for the user
        DB::transaction(function () use ($userId, $coupon, &$user) {
            // Deduct points from the user
            DB::table('users')->where('id', $userId)->decrement('points', $coupon->points_required);

            // Update session points
            $user['points'] -= $coupon->points_required;
            Session::put('user', $user);

            // Save the coupon for the user
            DB::table('coupons_per_user')->insert([
                'coupon_id' => $coupon->id,
                'user_id' => $userId,
                'used' => false,
            ]);
        });

        return response()->json(['message' => 'Coupon redeemed successfully!']);
    }
}

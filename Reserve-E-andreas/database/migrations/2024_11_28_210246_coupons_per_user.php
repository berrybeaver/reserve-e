<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coupons_per_user', function (Blueprint $table) {
            $table->foreignId('coupon_id')->constrained('coupons');
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('used')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

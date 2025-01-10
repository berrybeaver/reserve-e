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
        Schema::create('badges_per_user', function (Blueprint $table) {
            $table->foreignId('badge_id')->constrained('badges');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('counter_for_fulfillment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badges_per_user');
    }
};

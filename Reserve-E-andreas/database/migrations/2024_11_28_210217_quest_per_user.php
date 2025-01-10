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
        Schema::create('quest_per_user', function (Blueprint $table) {
           $table->foreignId('quest_id')->constrained('quests');
           $table->foreignId('user_id')->constrained('users');
           $table->integer('counter_for_fulfillment');
           $table->boolean('claimed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('quest_per_user');
    }
};

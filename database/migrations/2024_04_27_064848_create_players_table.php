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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('email');
            $table->string('password');
            $table->date('born');
            $table->longText('birthPlace');
            $table->float('height');
            $table->string('playingRole');
            $table->string('battingStyle');
            $table->string('bowlingStyle');
            $table->string('playerImage')->nullable();
            $table->integer('price');
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};

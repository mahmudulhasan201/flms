<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->string('leagueId');
            $table->string('homeTeamId');
            $table->string('awayTeamId');
            $table->string('session');
            $table->date('date');
            $table->string('venue_id');
            $table->string('status')->default('Active');
            $table->timestamps();  
        }); 
    }


    public function down(): void
    {
        Schema::dropIfExists('fixtures');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecasts', function (Blueprint $table) {
            $table->id();

            $table->string('slug', 64);

            $table->dateTime('dt');

            $table->string('icon')->nullable();
            $table->string('description')->nullable();

            $table->float('temp_day')->nullable();
            $table->float('temp_night')->nullable();

            $table->float('feels_like_day')->nullable();
            $table->float('feels_like_night')->nullable();
            
            $table->float('pressure')->nullable();
            $table->float('humidity')->nullable();
            $table->float('clouds')->nullable();
            $table->float('wind_speed')->nullable();
            $table->float('wind_deg')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forecasts');
    }
};

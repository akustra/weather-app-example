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
        Schema::create('weather', function (Blueprint $table) {
            $table->id();

            $table->dateTime('dt');

            $table->string('icon')->nullable();
            $table->string('description')->nullable();

            $table->float('temp')->nullable();
            $table->float('feels_like')->nullable();
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
        Schema::dropIfExists('weather');
    }
};

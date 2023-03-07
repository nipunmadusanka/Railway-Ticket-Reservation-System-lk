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
        Schema::create('tarintimes', function (Blueprint $table) {
            $table->id();
            $table->string('trainName');
            $table->string('from');
            $table->string('startTime');
            $table->string('to');
            $table->string('endTime');
            $table->string('seatN');
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
        Schema::dropIfExists('tarintimes');
    }
};

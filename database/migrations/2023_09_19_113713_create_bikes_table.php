<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

 class CreateBikesTable extends Migration
{

    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
            $table->string('bike_name');
            $table->string('brand');
            $table->string('model');
            $table->integer('year')->nullable();
            $table->string('serial_number');
        });
    }


    public function down()
    {
        Schema::dropIfExists('bikes');
    }
};

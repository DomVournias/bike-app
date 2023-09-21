<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceRequestsTable extends Migration
{

    public function up()
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('bike_id')->constrained('bikes');
            $table->string('description');
            $table->json('worksheet');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('service_requests');
    }
};

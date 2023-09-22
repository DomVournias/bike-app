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
        Schema::table('service_requests', function (Blueprint $table) {
            // Remove the 'description' and 'worksheet' columns
            $table->dropColumn('description');
            $table->dropColumn('worksheet');

            // Add the new columns
            $table->string('bike_name');
            $table->text('task');
            $table->boolean('done');
            $table->integer('cost');
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
        Schema::table('service_requests', function (Blueprint $table) {
          
            $table->dropColumn('bike_name');
            $table->dropColumn('task');
            $table->dropColumn('bike_id');
            $table->dropColumn('done');
            $table->dropColumn('cost');
            $table->dropColumn('user_id');
        });
    }
};
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
        Schema::create('workout_sets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('workout_sessions_id');
            $table->foreign('workout_sessions_id')->references('id')->on('workout_sessions');
            $table->unsignedBigInteger('exercises_id');
            $table->foreign('exercises_id')->references('id')->on('exercises');
            $table->integer('reps');
            $table->integer('weight');
            $table->integer('set_number');
            $table->integer('duration_sec')->nullable(); // for cardio
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_sets');
    }
};

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
            $table->unsignedBigInteger('workout_session_id');
            $table->foreign('workout_session_id')->references('id')->on('workout_sessions');
            $table->unsignedBigInteger('exercise_id');
            $table->foreign('exercise_id')->references('id')->on('exercises');
            $table->integer('reps')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('set_number')->nullable();
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

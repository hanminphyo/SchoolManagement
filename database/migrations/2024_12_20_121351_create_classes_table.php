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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('course_id');
            $table->string('days_in_a_week');
            $table->time('time');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();


            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            // $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};

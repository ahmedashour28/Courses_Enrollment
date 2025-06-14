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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studentID');
            $table->foreign('studentID')
            ->references('id')
            ->on('students')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('trainingID');
            $table->foreign('trainingID')
            ->references('id')
            ->on('traning_courses')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};

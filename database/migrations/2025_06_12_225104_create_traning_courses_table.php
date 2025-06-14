<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Courses;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('traning_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('courseID');
            $table->foreign('courseID')
            ->references('id')
            ->on('courses')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->date('startDate')->comment('The traning starts at');
            $table->date('endDate')->comment('The traning ends at');
            $table->decimal('price',10,2);
            $table->string('notes',400)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traning_courses');
    }
};

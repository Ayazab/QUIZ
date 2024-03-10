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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained(); // Assuming a foreign key relationship with students table
            $table->foreignId('quiz_id')->constrained(); // Assuming a foreign key relationship with quizzes table            $table->string('sub_name');
            $table->integer('marks_obtained');
            $table->integer('total_marks');
            // Add other columns as needed

            $table->timestamps();
        });

        // Add foreign key constraints if needed
        Schema::table('results', function (Blueprint $table) {
            // Add other foreign key constraints as needed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
};

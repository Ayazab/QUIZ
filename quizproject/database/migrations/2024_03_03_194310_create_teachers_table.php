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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            // $table->string('teacher_id')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username')->unique();
            $table->string('email_id')->unique();
            $table->string('password');
            $table->string('subject_name')->nullable();
            $table->string('profile_pic')->nullable();
            $table->boolean('is_approved')->default(false); // Added is_approved column
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
        Schema::dropIfExists('teachers');
    }
};

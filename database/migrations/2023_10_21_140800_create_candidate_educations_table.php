<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('candidate_educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('edu_level_of_education')->nullable();
            $table->string('edu_field_of_study')->nullable();
            $table->string('edu_school')->nullable();
            $table->string('edu_country')->nullable();
            $table->string('edu_city')->nullable();
            $table->date('edu_start_date')->nullable();
            $table->date('edu_end_date')->nullable();
            $table->timestamps();
        });
    }


   
    public function down(): void
    {
        Schema::dropIfExists('candidate_educations');
    }
};

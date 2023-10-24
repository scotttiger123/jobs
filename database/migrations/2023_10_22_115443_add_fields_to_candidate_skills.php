<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('candidate_skills', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('skill_name');
            $table->integer('year_of_experience');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidate_skills');
    }
};

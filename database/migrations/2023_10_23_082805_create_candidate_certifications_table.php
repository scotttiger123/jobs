<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('candidate_certifications', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_description')->nullable();
            $table->date('certificate_start_date')->nullable();
            $table->date('certificate_end_date')->nullable();
            $table->string('certificate_name')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidate_certifications');
    }
};

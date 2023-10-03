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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('jobTitle')->nullable();
            $table->text('jobDescription')->nullable();
            $table->string('skillsRequired')->nullable();
            $table->string('careerLevel')->nullable();
            $table->integer('numPositions')->nullable();
            $table->json('jobLocation')->nullable();
            $table->integer('min_salery')->nullable();
            $table->integer('max_salery')->nullable();
            $table->boolean('salaryVisibility')->default(true);
            $table->string('genderPreference')->nullable();
            $table->date('apply_by_date')->nullable();
            $table->string('qualification')->nullable();
            $table->string('specificDegreeTitle')->nullable();
            $table->integer('minExperience')->nullable();
            $table->integer('maxExperience')->nullable();
            $table->string('experienceInfo')->nullable();
            $table->integer('minAge')->nullable();
            $table->integer('maxAge')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};

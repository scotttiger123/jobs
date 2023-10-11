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
            $table->string('jobTitle')->nullable()->collation('utf8mb4_general_ci');
            $table->text('jobDescription')->nullable()->collation('utf8mb4_general_ci');
            $table->string('skillsRequired')->nullable()->collation('utf8mb4_general_ci');
            $table->string('careerLevel')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('numPositions')->nullable()->collation('utf8mb4_general_ci');
            $table->json('jobLocation')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('min_salary')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('max_salary')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('job_type')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('job_shift')->nullable()->collation('utf8mb4_general_ci');
            $table->boolean('salaryVisibility')->default(true)->collation('utf8mb4_general_ci');
            $table->string('genderPreference')->nullable()->collation('utf8mb4_general_ci');
            $table->date('apply_by_date')->nullable()->collation('utf8mb4_general_ci');
            $table->string('qualification')->nullable()->collation('utf8mb4_general_ci');
            $table->string('specificDegreeTitle')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('minExperience')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('maxExperience')->nullable()->collation('utf8mb4_general_ci');
            $table->string('experienceInfo')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('minAge')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('maxAge')->nullable()->collation('utf8mb4_general_ci');
            $table->string('jobType')->nullable()->collation('utf8mb4_general_ci');
            $table->string('company')->nullable()->collation('utf8mb4_general_ci');
            $table->integer('created_by')->nullable()->collation('utf8mb4_general_ci');
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

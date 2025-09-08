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
        Schema::create('my_jobs', function (Blueprint $table) {
           
            $table->id();
            $table->string('job_title');
            $table->foreignId('job_category')->constrained('job_categories');
            $table->string('job_type');
            $table->string('work_setup');
            $table->string('location')->nullable();
            $table->integer('vacancies')->default(1);
            $table->text('job_description')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('required_skills')->nullable();
            $table->text('preferred_skills')->nullable();
            $table->string('experience_level');
            $table->string('salary_range')->nullable();
            $table->string('currency')->nullable();
            $table->string('payment_schedule')->nullable();
            $table->text('benefits')->nullable();
            $table->date('application_deadline')->nullable();
            $table->string('apply_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_jobs');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_job_skill', function (Blueprint $table) {
            $table->uuid('employee_job_id');
            $table->uuid('skill_id');
            $table->primary(['employee_job_id', 'skill_id']);
            $table->foreign('employee_job_id')->references('id')->on('employee_jobs')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('employee_job_skill');
    }
};

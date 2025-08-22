<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_job_category', function (Blueprint $table) {
            $table->uuid('employee_job_id');
            $table->uuid('category_id');
            $table->primary(['employee_job_id', 'category_id']);
            $table->foreign('employee_job_id')->references('id')->on('employee_jobs')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('employee_job_category');
    }
};

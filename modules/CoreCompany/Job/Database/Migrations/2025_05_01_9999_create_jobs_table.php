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
        Schema::create('employee_jobs', function (Blueprint $table) {
            $table->uuid('id')->primary()->index();
            $table->uuid('job_title_id')->index();
            $table->string('type')->index();
            $table->json('category_ids');
            $table->text('position_description')->nullable();
            $table->text('company_description')->nullable();
            $table->json('skill_ids')->nullable();
            $table->text('employee_description')->nullable();
            $table->text('team_description')->nullable();

            $table->json('interview')->nullable();

            $table->string('salary_form');
            $table->string('salary_to');

            $table->string('pay');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

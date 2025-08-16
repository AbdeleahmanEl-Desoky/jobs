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

            $table->text('description')->nullable();
            $table->timestamp('company_description')->nullable();
            $table->string('type')->default('company');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            
            $table->string('category_ids')->index();
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

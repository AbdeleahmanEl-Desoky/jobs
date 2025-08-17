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
        Schema::create('apply_jobs', function (Blueprint $table) {
            $table->uuid('id')->primary()->index();
            $table->uuid('company_id')->index();
            $table->string('user_id')->index();
            $table->string('employee_job_id')->index();
            $table->text('cover_letter')->nullable();
            $table->tinyInteger('agree_privacy_policy')->default(0)->nullable();
            $table->tinyInteger('agree_future_job')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apply_jobs');
    }
};

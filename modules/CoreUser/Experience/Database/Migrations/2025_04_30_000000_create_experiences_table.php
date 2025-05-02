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
        Schema::create('experiences', function (Blueprint $table) {
            $table->uuid('id')->primary()->index();
            $table->string('position_title');
            $table->string('company_name');
            $table->uuid('company_field_id')->index();
            $table->uuid('company_size_id')->index();
            $table->uuid('job_title_id')->index();
            $table->uuid('country_id')->index();
            $table->uuid('city_id')->index();
            $table->uuid('field_id')->index();
            $table->string('date_from')->index();
            $table->string('date_to')->index();
            $table->string('description')->nullable();
            $table->boolean('find_job')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

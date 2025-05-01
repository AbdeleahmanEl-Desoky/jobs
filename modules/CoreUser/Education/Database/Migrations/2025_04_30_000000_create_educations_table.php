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
        Schema::create('educations', function (Blueprint $table) {
            $table->uuid('id')->primary()->index();
            $table->uuid('user_id')->index();
            $table->uuid('degree_id')->index();
            $table->uuid('country_id')->index();
            $table->uuid('city_id')->index();
            $table->uuid('field_id')->index();
            $table->uuid('specialization_id')->index();
            $table->uuid('university_id')->index();
            $table->string('date_from')->index();
            $table->string('date_to')->index();
            $table->enum('graduation_grade_type', ['GPA','percentage'])->index();
            $table->integer('graduation_grade_value')->index();
            $table->string('description')->nullable();
            $table->timestamps();
        });

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educations');

    }
};

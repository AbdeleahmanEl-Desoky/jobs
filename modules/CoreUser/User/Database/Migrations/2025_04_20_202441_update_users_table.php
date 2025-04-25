<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->nullable();
            $table->string('phonecode')->after('phone')->nullable();
            $table->uuid('country_id')->index();
            $table->uuid('city_id')->index();
            $table->string('postal_code')->nullable();
            $table->decimal('minimum_salary_amount',10,2)->nullable();
            $table->integer('Payment_period')->nullable();
            $table->string('about')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_name');
            $table->dropColumn('phonecode');
            $table->dropColumn('country_id');
            $table->dropColumn('city_id');
            $table->dropColumn('postal_code');

            $table->dropColumn('minimum_salary_amount');
            $table->dropColumn('Payment_period');
            $table->dropColumn('about');

        });
    }
};

// database/migrations/YYYY_MM_DD_HHMMSS_create_saved_table.php
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
        Schema::create('saved', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuidMorphs('savable');
            $table->uuid('user_id')->index();
            $table->timestamp('saved_at')->useCurrent();
            $table->timestamps();

            // Optional: Add a unique constraint if a user can only save an item once
            $table->unique(['savable_id', 'savable_type', 'user_id'], 'unique_savable_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saved');
    }
};

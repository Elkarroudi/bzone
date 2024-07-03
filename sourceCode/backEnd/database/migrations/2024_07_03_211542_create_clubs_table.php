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
        Schema::create('clubs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('owner_id')->references('id')->on('owners')->cascadeOnDelete();
            $table->foreignUuid('added_by')->references('id')->on('managers')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->string('logo');
            $table->string('cover');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};

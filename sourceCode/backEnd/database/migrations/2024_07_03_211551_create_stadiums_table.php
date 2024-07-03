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
        Schema::create('stadiums', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('club_id')->references('id')->on('clubs')->cascadeOnDelete();
            $table->string('name');
            $table->string('sport_type');
            $table->string('play_mode');
            $table->json('pictures');
            $table->json('opening_hours');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stadia');
    }
};

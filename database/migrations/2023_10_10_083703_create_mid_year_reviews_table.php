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
        Schema::create('mid_year_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appraisee_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('appraiser_id')->constrained('users');
            $table->text('targets_progress_review');
            $table->text('targets_remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mid_year_reviews');
    }
};

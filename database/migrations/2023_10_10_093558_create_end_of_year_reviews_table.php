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
        Schema::create('end_of_year_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('targets_id')->constrained('targets')->onDelete('cascade');
            $table->foreignId('appraisee_id')->constrained('users')->onDelete('cascade');
            $table->text('performance_assessment');
            $table->string('score');
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('end_of_year_reviews');
    }
};

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
        Schema::create('training_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appraisee_id')->constrained('users')->onDelete('cascade');;
            $table->foreignId('appraiser_id')->constrained('users');
            $table->string('institution');
            $table->date('training_date');
            $table->string('institution2')->nullable();
            $table->date('training_date2')->nullable();
            $table->string('institution3')->nullable();
            $table->date('training_date3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_records');
    }
};

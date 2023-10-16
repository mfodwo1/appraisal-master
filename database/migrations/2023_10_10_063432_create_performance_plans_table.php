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
        Schema::create('performance_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appraisee_id')->constrained('users')->onDelete('cascade');;
            $table->foreignId('appraiser_id')->constrained('users');
            $table->foreignId('department_id')->constrained('departments');
            $table->boolean('appraisee_approve')->default('0');
            $table->boolean('appraiser_approve')->default('0');
            $table->string('key_result_area');
            $table->string('resource_required');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance_plans');
    }
};

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
        Schema::create('annual_appriasal_none_cores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appraisee_id')->constrained('users')->onDelete('cascade');
            $table->string('develop_other');
            $table->string('provide_guidance');
            $table->string('self_development');
            $table->string('supplement_training');
            $table->string('customer_satisfaction');
            $table->string('quality_service');
            $table->string('regulation');
            $table->string('act');
            $table->string('respect');
            $table->string('commitment_toWork');
            $table->string('function_in_team');
            $table->string('work_in_team');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annual_appriasal_none_cores');
    }
};

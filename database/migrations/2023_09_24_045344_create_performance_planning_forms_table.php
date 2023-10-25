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
        Schema::create('performance_planning_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appraisee_id')->constrained('users')->onDelete('cascade');;
            $table->foreignId('appraiser_id')->constrained('users');
            $table->text('key_result_area');
            $table->text('target_1');
            $table->text('target_2')->nullable();
            $table->text('target_3')->nullable();
            $table->text('target_4')->nullable();
            $table->text('target_5')->nullable();
            $table->text('resource_required');
            $table->text('targets_progress_review')->nullable();
            $table->text('targets_remarks')->nullable();
            $table->text('competency')->nullable();
            $table->text('competency_progress_review')->nullable();
            $table->text('competency_remarks')->nullable();
            $table->text('performance_assessment')->nullable();
            $table->text('score')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('appraisee_approve')->default(0);
            $table->boolean('appraiser_approve')->default(0);
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('performance_planning_forms');
    }
};

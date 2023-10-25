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
        Schema::create('annual_appriasal_cores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appraisee_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('appraiser_id')->constrained('users');
            $table->string('plan');
            $table->string('work');
            $table->string('manage');
            $table->string('organizational_change');
            $table->string('creativity');
            $table->string('thinking');
            $table->string('initiate_action');
            $table->string('accept_responsibility');
            $table->string('good_judgment');
            $table->string('development');
            $table->string('customer_satisfaction');
            $table->string('personnel_development');
            $table->string('communicate_decision');
            $table->string('negotiate');
            $table->string('network');
            $table->string('manual_skill');
            $table->string('cross_functional_awareness');
            $table->string('expertise');
            $table->string('team_work');
            $table->string('show_support');
            $table->string('adhere_principle');
            $table->string('inspire_other');
            $table->string('confidence');
            $table->string('manage_pressure');
            $table->string('accountability');
            $table->string('business_processes');
            $table->string('result_based_action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annual_appriasal_cores');
    }
};

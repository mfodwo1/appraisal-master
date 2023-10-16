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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to associate with users table
            $table->text('appraiser_comments');
            $table->text('appraisee_comments');
            $table->text('hod_comments');
            $table->boolean('appraiser_sign')->default('0')->nullable();
            $table->boolean('appraisee_sign')->default('0')->nullable();
            $table->boolean('hod_sign')->default('0')->nullable();
            $table->date('appraiser_sign_date');
            $table->date('appraisee_sign_date');
            $table->date('hod_sign_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appraisal_comments');
    }
};

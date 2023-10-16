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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('staff_id')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('profile_photo_path', 255)->nullable();
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('other_names')->nullable();
            $table->string('title')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('grade_salary')->nullable();
            $table->string('present_job_title')->nullable();
            $table->date('date_of_appointment')->nullable();
//            $table->foreignId('department_id')->constrained('departments');
            $table->enum('user_type', ['HOD', 'Appraiser', 'Appraisee', 'Guest'])->default('Guest');
            $table->string('signature')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

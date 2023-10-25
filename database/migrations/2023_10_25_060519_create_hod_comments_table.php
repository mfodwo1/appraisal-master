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
        Schema::create('hod_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hod_id')->constrained('users');
            $table->text('hod_comments');
            $table->boolean('hod_signed')->default(false)->nullable();
            $table->date('hod_sign_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hod_comments');
    }
};

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
        Schema::create('doctor_profiles', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    $table->text('about_me')->nullable();
    $table->integer('years_of_experience')->nullable();
    $table->string('certificate')->nullable();
    $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
    $table->integer('appointment_duration')->default(30)->comment('Duration in minutes');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_profiles');
    }
};

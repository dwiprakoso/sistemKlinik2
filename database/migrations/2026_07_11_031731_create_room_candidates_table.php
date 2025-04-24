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
        Schema::create('room_candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rooms_id');
            $table->unsignedInteger('candidates_id');
            $table->enum('status', ['pending', 'approved', 'rejected', 'present', 'absent'])->default('pending');
            $table->timestamps();
            $table->unsignedInteger('current_step_number')->default(1);
            $table->unsignedInteger('current_step_id')->nullable();
            // Foreign keys
            $table->foreign('rooms_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('candidates_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('current_step_id')->references('id')->on('room_steps')->onDelete('set null');

            // Unique constraint to prevent duplicate relationships
            $table->unique(['rooms_id', 'candidates_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_candidates');
    }
};

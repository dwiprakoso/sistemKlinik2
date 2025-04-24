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
        Schema::create('room_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_id');
            $table->integer('step_number');
            $table->enum('step_type', ['Upload Berkas', 'Challenge', 'Meeting', 'Interview', 'Test', 'Custom'])->default('Upload Berkas');
            $table->string('step_name', 255);
            $table->text('step_description')->nullable();
            $table->string('location_link', 255)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('attachment_path', 255)->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });

        Schema::create('candidate_submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('room_step_id');
            $table->string('submission_file_path', 255);
            $table->text('notes')->nullable();
            $table->timestamp('submitted_at');
            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('room_step_id')->references('id')->on('room_steps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_submissions');
        Schema::dropIfExists('room_steps');
    }
};
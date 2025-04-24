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
        Schema::create('submission_meeting_invitations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('path_meeting_invitation_id');
            $table->unsignedInteger('candidate_id');
            $table->enum('konfirmasi_kehadiran', ['yes', 'no'])->nullable();
            $table->text('keterangan_tambahan')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();

            // Define foreign key with custom name
            $table->foreign('path_meeting_invitation_id', 'fk_submission_meeting_invitation_path_id')
                  ->references('id')->on('path_meeting_invitations')
                  ->onDelete('cascade');

            $table->foreign('candidate_id', 'fk_submission_meeting_invitation_candidate_id')
                  ->references('id')->on('candidates')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submission_meeting_invitations');
    }
};

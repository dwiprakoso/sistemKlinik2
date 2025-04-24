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
        Schema::create('submission_challanges', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('path_challange_id');
            $table->unsignedInteger('candidate_id');
            $table->text('berkas');
            $table->text('keterangan_tambahan')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();

            // Foreign keys
            $table->foreign('path_challange_id')->references('id')->on('path_challanges')->onDelete('cascade');
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submission_challanges');
    }
};

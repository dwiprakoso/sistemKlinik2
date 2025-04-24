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
        Schema::create('path_candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('path_id');
            $table->unsignedInteger('candidate_id');
            $table->enum('status', ['pending', 'approved', 'rejected', 'present', 'absent'])->default('pending');
            $table->timestamps();

            // Foreign keys
            $table->foreign('path_id')->references('id')->on('paths')->onDelete('cascade');
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('path_candidates');
    }
};

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
        Schema::create('pivot_candidate_languanges', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('candidate_id');
            $table->unsignedInteger('language_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('candidates_languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_candidate_languanges');
    }
};

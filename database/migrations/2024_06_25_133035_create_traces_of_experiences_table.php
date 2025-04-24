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
        Schema::create('traces_of_experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('photo_path', 255)->nullable();
            $table->unsignedInteger('candidate_id');
            // Foreign keys
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->string('position', 255);
            $table->text('description');
            $table->datetime('year_in')->nullable();
            $table->datetime('year_out')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traces_of_experiences');
    }
};

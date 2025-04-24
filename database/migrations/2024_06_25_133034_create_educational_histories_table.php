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
        Schema::create('educational_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('institution_name', 255);
            $table->unsignedInteger('candidate_id');
            // Foreign keys
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->string('major', 255);
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
        Schema::dropIfExists('educational_histories');
    }
};

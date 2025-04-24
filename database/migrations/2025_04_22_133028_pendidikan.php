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
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resume_id');
            $table->string('gelar', 255)->nullable();
            $table->string('institusi', 255)->nullable();
            $table->date('tahun_mulai')->nullable();
            $table->date('tahun_selesai')->nullable();
            $table->timestamps();
            
            $table->foreign('resume_id')
                  ->references('id')
                  ->on('resumes')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan');
    }
};
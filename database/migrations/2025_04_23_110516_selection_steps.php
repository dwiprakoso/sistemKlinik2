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
        Schema::create('selection_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_id');
            $table->string('step_type', 100); // Upload Berkas, Challenge, Meeting, dll
            $table->string('step_name', 255);
            $table->text('step_description')->nullable();
            $table->string('step_location', 255)->nullable(); // Untuk lokasi meeting atau link
            $table->date('step_start_date')->nullable();
            $table->date('step_end_date')->nullable();
            $table->string('step_attachment_path', 255)->nullable();
            $table->integer('step_order'); // Urutan tahapan
            $table->timestamps();
        
            // Foreign key
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

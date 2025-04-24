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
        Schema::create('path_pemberkasans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('path_id');
            $table->text('deskripsi');
            $table->string('rentang_waktu', 255);
            $table->text('lampiran');
            $table->timestamps();

            // Foreign key
            $table->foreign('path_id')->references('id')->on('paths')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('path_pemberkasans');
    }
};

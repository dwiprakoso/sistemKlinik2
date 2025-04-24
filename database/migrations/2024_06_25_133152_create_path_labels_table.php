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
        Schema::create('path_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('path_type_id');
            $table->string('label_name', 255);
            $table->enum('input_type', ['text', 'date', 'file'])->default('text');
            $table->timestamps();

            // Foreign key
            $table->foreign('path_type_id')->references('id')->on('path_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('path_labels');
    }
};

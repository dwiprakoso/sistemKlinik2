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
        Schema::create('path_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('path_id');
            $table->unsignedInteger('label_id');
            $table->text('value');
            $table->timestamps();

            // Foreign keys
            $table->foreign('path_id')->references('id')->on('paths')->onDelete('cascade');
            $table->foreign('label_id')->references('id')->on('path_labels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('path_details');
    }
};

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
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id');
            $table->text('banner')->nullable();
            $table->string('position_name', 255);
            $table->string('departement', 255);
            $table->text('description')->nullable();
            $table->text('requirements')->nullable();
            $table->enum('years_of_experience_criteria', ['<1 tahun', '1 tahun', '2 tahun', '3 - 4 tahun'])->default('<1 tahun');
            $table->integer('total_open_position');
            $table->string('salary', 4000)->nullable(); // assuming "sallary" was meant to be "salary"
            $table->datetime('deadline');
            $table->enum('access_rights', ['public', 'private'])->default('public');
            $table->enum('work_system', ['WFO', 'Hybrid', 'WFH'])->default('WFO');
            $table->enum('working_hours', ['full time', 'magang', 'part time'])->default('full time');
            $table->timestamps();

            // Foreign key
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};

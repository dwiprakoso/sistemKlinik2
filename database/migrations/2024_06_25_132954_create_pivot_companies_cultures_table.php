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
        Schema::create('pivot_companies_cultures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('culture_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('company_id')->references('id')->on('companies')
                  ->onDelete('cascade');
            $table->foreign('culture_id')->references('id')->on('companies_cultures')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_companies_cultures');
    }
};

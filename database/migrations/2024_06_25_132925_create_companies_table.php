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
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name', 255)->notNull();
            $table->string('logo', 255)->nullable();
            $table->string('banner', 255)->nullable();
            $table->string('company_address', 255)->nullable();
            $table->string('company_website', 255)->nullable();
            $table->string('company_motto', 255)->nullable();
            $table->string('company_type', 255)->nullable();
            $table->string('company_description', 1000)->nullable();
            $table->timestamps(); // Tambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};

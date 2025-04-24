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
        Schema::create('roles_user_company', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('company_user_id');
            $table->unsignedInteger('roles_company_id');
            $table->timestamps();

            $table->foreign('company_user_id')
                ->references('id')
                ->on('company_users')
                ->onDelete('cascade');

            $table->foreign('roles_company_id')
                ->references('id')
                ->on('roles_companies')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_user_company');
    }
};

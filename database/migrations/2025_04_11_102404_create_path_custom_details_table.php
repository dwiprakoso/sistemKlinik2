<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tambahkan tipe path custom pada tabel path_types jika belum ada
        if (Schema::hasTable('path_types')) {
            DB::table('path_types')->insertOrIgnore([
                'id' => 4,
                'type_name' => 'Custom',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Buat tabel untuk detail path custom
        Schema::create('path_custom_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('path_id');
            $table->json('data');
            $table->timestamps();

            $table->foreign('path_id')->references('id')->on('paths')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel path_custom_details
        Schema::dropIfExists('path_custom_details');
        
        // Hapus tipe path custom dari tabel path_types
        if (Schema::hasTable('path_types')) {
            DB::table('path_types')->where('id', 4)->delete();
        }
    }
};
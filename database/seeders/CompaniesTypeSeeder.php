<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data tipe perusahaan yang akan di-seed
        $types = [
            ['type' => 'Teknologi'],
            ['type' => 'Manufaktur'],
            ['type' => 'Perbankan dan Keuangan'],
            ['type' => 'Pendidikan'],
            ['type' => 'Kesehatan'],
            ['type' => 'E-commerce'],
            ['type' => 'Konsultan'],
            ['type' => 'Media dan Hiburan'],
            ['type' => 'Pariwisata'],
            ['type' => 'Transportasi'],
            ['type' => 'UMKM'],
            ['type' => 'Organisasi Kemasyarakatan'],
            // Tambahkan jenis perusahaan lain sesuai kebutuhan
        ];

        // Insert data tipe perusahaan ke dalam tabel companies_type
        DB::table('companies_types')->insert($types);
    }
}

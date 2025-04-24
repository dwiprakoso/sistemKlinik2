<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PathTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data jenis-jenis path yang akan di-seed
        $types = [
            ['type_name' => 'uploudBerkas'],
            ['type_name' => 'meetInvitation'],
            ['type_name' => 'Challange'],
        ];

        // Insert data jenis-jenis path ke dalam tabel path_types
        DB::table('path_types')->insert($types);
    }
}

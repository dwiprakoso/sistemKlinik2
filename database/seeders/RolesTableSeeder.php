<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data roles yang akan di-seed
        $roles = [
            ['name' => 'admin'],
            ['name' => 'participant'],
            ['name' => 'recruiter'],
        ];

        // Insert data roles ke dalam tabel roles
        DB::table('roles')->insert($roles);
    }
}

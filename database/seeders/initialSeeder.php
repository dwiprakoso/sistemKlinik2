<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class initialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            RolesTableSeeder::class,
            CompaniesTypeSeeder::class,
            PathTypesSeeder::class,
            UsersTableSeeder::class,
            benefit_table::class,
        ]);
    }
}

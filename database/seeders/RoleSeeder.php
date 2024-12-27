<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Patient;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed Admin
        Admin::create([
            'nama' => 'Admin',
            'alamat' => 'alamat',
            'password' => Hash::make('alamat'),
        ]);

        // Seed Doctor

    }
}

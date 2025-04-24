<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cek apakah admin sudah ada
        $adminExists = DB::table('users')
            ->where('email', 'admin@jobmatch.com')
            ->exists();

        if (!$adminExists) {
            // Buat user admin
            $userId = DB::table('users')->insertGetId([
                'username' => 'admin_user',
                'email' => 'admin@jobmatch.com',
                'password' => Hash::make('admin123'), // Ganti dengan password yang lebih aman
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Tambahkan ke role_users (relasi many-to-many)
            DB::table('role_users')->insert([
                'user_id' => $userId,
                'role_id' => 1, // Admin role (ID 1 berdasarkan tabel roles)
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            
            $this->command->info('Admin user created successfully!');
        } else {
            $this->command->info('Admin user already exists.');
        }
    }
}
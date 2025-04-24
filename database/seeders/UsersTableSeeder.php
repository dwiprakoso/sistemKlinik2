<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data user yang akan di-seed
        $users = [
            [
                'username' => 'admin_user',
                'email' => 'admin@jobmatch.com',
                'password' => bcrypt('password123'), // Ubah sesuai kebutuhan Anda
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'participant_user',
                'email' => 'participant@jobmatch.com',
                'password' => bcrypt('password123'), // Ubah sesuai kebutuhan Anda
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'recruiter_user',
                'email' => 'recruiter@jobmatch.com',
                'password' => bcrypt('password123'), // Ubah sesuai kebutuhan Anda
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($users as $user) {
            // Insert data user ke dalam tabel users dan dapatkan ID-nya
            $userId = DB::table('users')->insertGetId($user);

            // Ambil role_id berdasarkan username
            $roleId = null;
            switch ($user['username']) {
                case 'admin_user':
                    $roleId = 1; // Sesuaikan dengan ID role Admin
                    break;
                case 'participant_user':
                    $roleId = 2; // Sesuaikan dengan ID role Participant
                    break;
                case 'recruiter_user':
                    $roleId = 3; // Sesuaikan dengan ID role Recruiter
                    break;
                // Tambahkan case sesuai dengan username dan role yang sesuai
            }

            // Data role_user yang akan di-seed
            $roleUser = [
                'user_id' => $userId,
                'role_id' => $roleId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            // Insert data role_user ke dalam tabel role_users
            DB::table('role_users')->insert($roleUser);
        }
    }
}

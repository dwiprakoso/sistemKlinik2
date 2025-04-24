<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAslam extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'aslamthariq',
            'email' => 'aslamthariq01@gmail.com',
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang diinginkan
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $userId = DB::table('users')->where('email', 'aslamthariq01@gmail.com')->value('id');

        DB::table('candidates')->insert([
            'user_id' => $userId,
            'full_name' => 'Aslam Thariq Akbar Akrami',
            'bio' => "I'm a sixth semester S1-Engineering Informatics student at Dian Nuswantoro University. I'm actively involved in BEM FIK UDINUS and Radio Swara Dian, gaining experience in organizing campus-wide events. I'm passionate about Machine Learning and other tech areas like Cloud Computing, NLP, IoT, and Networking, and I'm open to connecting with professionals for potential collaborations or projects.",
            'address' => 'Semarang, Indonesia',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('candidate_contacts')->insert([
            'candidate_id' => $userId,
            'email' => 'aslamthariq01@gmail.com',
            'telephone' => '+6281325080083',
            'instagram' => '@aslamthrq',
            'linkedin' => null,
            'facebook' => '@aslamthrq',
            'whatsapp' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Insert educational history
        DB::table('educational_histories')->insert([
            'institution_name' => 'Universitas Dian Nuswantoro',
            'major' => 'S1-Teknik Informatika',
            'year_in' => '2021-01-01', // Sesuaikan dengan tanggal masuk
            'year_out' => null, // Sesuaikan dengan tanggal keluar jika sudah lulus
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('educational_histories')->insert([
            'institution_name' => 'SMA N 4 Semarang',
            'major' => 'MIPA',
            'year_in' => '2018-01-01',
            'year_out' => '2021-01-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Insert skills
        DB::table('candidates_skills')->insert([
            'skill_name' => 'Tiduran',
            'percentage' => 80,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('candidates_skills')->insert([
            'skill_name' => 'Photoshop',
            'percentage' => 45,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Insert languages
        DB::table('candidates_languages')->insert([
            'language_name' => 'Bahasa Inggris',
            'percentage' => 60,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('candidates_languages')->insert([
            'language_name' => 'Bahasa Jawa',
            'percentage' => 90,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

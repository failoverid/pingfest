<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Data untuk nama, sekolah, dan universitas
        $names = [
            'Ayu Lestari', 'Budi Santoso', 'Citra Dewi', 'Dedi Kurniawan', 'Eka Prasetya', 
            'Fajar Nugroho', 'Gita Pertiwi', 'Hadi Supriyanto', 'Indah Permata', 'Joko Widodo'
        ];
        $schools = ['SMA Negeri 1 Jakarta', 'SMA Negeri 2 Surabaya', 'SMA Negeri 3 Bandung'];
        $universities = ['Universitas Indonesia', 'Institut Teknologi Bandung', 'Universitas Gadjah Mada'];

        // Seeder untuk Siswa
        for ($i = 0; $i < 30; $i++) {
            $name = $names[array_rand($names)];
            $school = $schools[array_rand($schools)];
            $user = DB::table('users')->insertGetId([
                'userType' => 'siswa',
                'name' => $name . ' ' . Str::random(3),
                'email' => Str::random(5) . '@example.com',
                'phone' => '0812' . rand(10000000, 99999999),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('user_siswas')->insert([
                'user_id' => $user,
                'school_name' => $school,
                'NISN' => 'NISN' . rand(100000, 999999),
                'student_card' => 'images/card-1.png',
                'BoTEmail' => null,
                'BoTPassword' => null,
                'VerifyAccount' => 'unverified',
                'Problem' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seeder untuk Mahasiswa
        for ($i = 0; $i < 30; $i++) {
            $name = $names[array_rand($names)];
            $university = $universities[array_rand($universities)];
            $user = DB::table('users')->insertGetId([
                'userType' => 'mahasiswa',
                'name' => $name . ' ' . Str::random(3),
                'email' => Str::random(5) . '@example.com',
                'phone' => '0812' . rand(10000000, 99999999),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('user_mahasiswas')->insert([
                'user_id' => $user,
                'university_name' => $university,
                'NIM' => 'NIM' . rand(100000, 999999),
                'university_card' => 'images/card-1.png',
                'CPEmail' => null,
                'CPPassword' => null,
                'VerifyAccount' => 'unverified',
                'Problem' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seeder untuk Umum
        for ($i = 0; $i < 30; $i++) {
            $name = $names[array_rand($names)];
            $user = DB::table('users')->insertGetId([
                'userType' => 'umum',
                'name' => $name . ' ' . Str::random(3),
                'email' => Str::random(5) . '@example.com',
                'phone' => '0812' . rand(10000000, 99999999),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('user_umums')->insert([
                'user_id' => $user,
                'NIK' => 'NIK' . rand(1000000000000000, 9999999999999999),
                'identification_card' => 'images/card-1.png',
                'VerifyAccount' => 'unverified',
                'Problem' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

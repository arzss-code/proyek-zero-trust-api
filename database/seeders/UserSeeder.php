<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Hapus data lama di tabel users untuk memastikan kebersihan data
        User::truncate();

        // 2. Buat Pengguna dengan Role Admin
        User::create([
            'google_id' => '111111111111111111111', // ID unik dummy dari Google
            'name' => 'Admin Utama',
            'email' => 'admin@contoh.com',
            'role' => 'admin', // Menetapkan peran sebagai admin
            'password' => Hash::make('password_admin_kuat'), // Password acak
        ]);

        // 3. Buat Pengguna dengan Role User Biasa
        User::create([
            'google_id' => '222222222222222222222', // ID unik dummy dari Google
            'name' => 'Pengguna Biasa',
            'email' => 'user@contoh.com',
            'role' => 'user', // Menetapkan peran sebagai user (atau biarkan default)
            'password' => Hash::make('password_user_biasa'), // Password acak
        ]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Pastikan ini ada
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menyisipkan data untuk tabel daerah
        DB::table('daerah')->insert([
            [
                'nama' => 'Boyolali Barat', 
                'alamat' => 'Boyolali, Jawa Tengah',
                'created_at' => now(), 
                'updated_at' => now()
            ],
        ]);

        // Menyisipkan data untuk tabel desa
        DB::table('desa')->insert([
            [
                'nama' => 'Sambi', 
                'alamat' => 'Sambi, Boyolali', 
                'id_daerah' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
        ]);

        // Menyisipkan data untuk tabel kelompok
        DB::table('kelompok')->insert([
            [
                'nama' => 'Gumukrejo', 
                'id_desa' => 1, 
                'alamat' => 'Gumukrejo, Sambi',
                'created_at' => now(), 
                'updated_at' => now()
            ],
        ]);

        DB::table('users')->insert([
            [
                'nama' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password123'), // Pastikan untuk mengenkripsi password
                'id_daerah' => 1, // Sesuaikan dengan data yang ada
                'id_desa' => 1,   // Sesuaikan dengan data yang ada
                'id_kelompok' => 1, // Sesuaikan dengan data yang ada
                'jabatan' => 'kelompok',
                'foto' => 'logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

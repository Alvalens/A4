<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create admin account
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('Admin123'),
            'role' => 'admin',
        ]);

        // Create guru account
        User::create([
            'name' => 'Guru',
            'email' => 'guru@example.com',
            'password' => Hash::make('Guru1234'),
            'role' => 'guru',
        ]);

        // create ortu account
        User::create([
            'name' => 'Orangtua',
            'email' => 'ortu@example.com',
            'password' => Hash::make('Ortu1234'),
            'role' => 'ortu',
        ]);
        User::create([
            'name' => 'PakBudi',
            'email' => 'budi@example.com',
            'password' => Hash::make('Budi1234'),
            'role' => 'ortu',
        ]);
        // create siswa account
        User::create([
            'name' => 'Siswa',
            'email' => 'ortu@example.com',
            'password' => Hash::make('Siswa123'),
            'role' => 'siswa',
        ]);
        User::create([
            'name' => 'JokoSatrio10',
            'email' => 'ortu@example.com',
            'password' => Hash::make('Satrio123'),
            'role' => 'siswa',
        ]);
        User::create([
            'name' => 'Amirul17',
            'email' => 'ortu@example.com',
            'password' => Hash::make('Amirul123'),
            'role' => 'siswa',
        ]);
        User::create([
            'name' => 'Erpan1140',
            'email' => 'budi@example.com',
            'password' => Hash::make('Erpn123'),
            'role' => 'siswa',
        ]);
    }
}

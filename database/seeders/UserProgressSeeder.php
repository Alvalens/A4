<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Materials;
use App\Models\UsersProgress;

class UserProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UsersProgress::create([
            'nama_user' => 'JokoSatrio10',
            'nama_materi' => 'Belajar Huruf',
            'progress' => '66',
            'level' => '1',
            'waktu_belajar' => '300'
        ]);
        UsersProgress::create([
            'nama_user' => 'JokoSatrio10',
            'nama_materi' => 'Belajar Angka',
            'progress' => '100',
            'level' => '1',
            'waktu_belajar' => '960'
        ]);

    }
}

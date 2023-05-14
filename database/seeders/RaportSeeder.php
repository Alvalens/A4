<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Raport;

class RaportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Raport::create([
            'nama' => 'JokoSatrio10',
            'catatan' => 'Siswa yang rajin mengikuti pembelajaran, namun masih perlu ditingkatkan lagi agar lebih untuk menyimak materi yang diberikan',
            'materi_favorit' => 'Belajar Huruf',
            'guru_pendamping' => 'Pak Budi P.hD',
        ]);
    }
}

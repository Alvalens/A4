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
            'catatan' => 'Siswa sangat rajin dalam mengikuti kegiatan pembelajaran, namun masih perlu ditingkatkan lagi agar lebih untuk menyimak materi yang diberikan',
            'materi_favorit' => 'Belajar Huruf',
            'guru_pendamping' => 'Pak Jamiar P.hD',
        ]);
        //
        Raport::create([
            'nama' => 'Amirul17',
            'catatan' => 'Siswa sangat rajin dalam mengikuti kegiatan pembelajaran, namun masih perlu ditingkatkan lagi agar lebih untuk menyimak materi yang diberikan',
            'materi_favorit' => 'kaligrafi',
            'guru_pendamping' => 'Pak Joko P.hD',
        ]);
    }
}

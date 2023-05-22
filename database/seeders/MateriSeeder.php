<?php

namespace Database\Seeders;

use App\Models\Materials;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Level 1
        Materials::create([
            'level' => '1',
            'judul' => 'Belajar Huruf',
            'link' => 'https://www.youtube.com/embed/1qhJqFk7wUc',
        ]);
        Materials::create([
            'level' => '1',
            'judul' => 'Belajar Angka',
            'link' => 'https://www.youtube.com/embed/Rc1S4h2dJ0s',
        ]);
        Materials::create([
            'level' => '1',
            'judul' => 'Menulis Huruf',
            'link' => 'https://www.youtube.com/embed/cQKKRKhC1Yw',
        ]);

        // Level 2
        Materials::create([
            'level' => '2',
            'judul' => 'Menulis Angka',
            'link' => 'https://www.youtube.com/embed/SzehfSmzQpY',
        ]);
        Materials::create([
            'level' => '2',
            'judul' => 'Berhitung',
            'link' => 'https://www.youtube.com/embed/Rc1S4h2dJ0s',
        ]);
        Materials::create([
            'level' => '2',
            'judul' => 'Pengenalan Warna',
            'link' => 'https://www.youtube.com/embed/gzRtLZRVV0Q',
        ]);

        // Level 3
        Materials::create([
            'level' => '3',
            'judul' => 'Menggambar',
            'link' => 'https://www.youtube.com/embed/D99jML4Qe3w',
        ]);
        Materials::create([
            'level' => '3',
            'judul' => 'Bentuk Geometri',
            'link' => 'https://www.youtube.com/embed/GFAcgaR0chM',
        ]);
        Materials::create([
            'level' => '3',
            'judul' => 'Membaca',
            'link' => 'https://www.youtube.com/embed/lt-hAsZ4bBE',
        ]);

        // Level 4
        Materials::create([
            'level' => '4',
            'judul' => 'Kaligrafi',
            'link' => 'https://www.youtube.com/embed/VjTVciqq2Jw',
        ]);
        Materials::create([
            'level' => '4',
            'judul' => 'Musik',
            'link' => 'https://www.youtube.com/embed/47qxUGbQMDc',
        ]);
        Materials::create([
            'level' => '4',
            'judul' => 'Cerita Anak',
            'link' => 'https://www.youtube.com/embed/_KjaLuooxBI',
        ]);
        Materials::create([
            'level' => '5',
            'judul' => 'Keterampilan Musikal Sederhana',
            'link' => 'https://www.youtube.com/embed/kswlcylkNys',
        ]);
        Materials::create([
            'level' => '5',
            'judul' => 'Keterampilan Menanam Tanaman',
            'link' => 'https://www.youtube.com/embed/WeRDkYZ4g3I',
        ]);
        Materials::create([
            'level' => '5',
            'judul' => 'Keterampilan Membaca Cepat dan Pemahaman',
            'link' => 'https://www.youtube.com/embed/BZ4wLWg3lS4',
        ]);

        // Level 6
        Materials::create([
            'level' => '6',
            'judul' => 'Keterampilan Menggambar Karakter Kartun',
            'link' => 'https://www.youtube.com/embed/tkSjfTU6rrA',
        ]);
        Materials::create([
            'level' => '6',
            'judul' => 'Keterampilan Membaca',
            'link' => 'https://www.youtube.com/embed/FlFsFYJykHc',
        ]);
    }
}

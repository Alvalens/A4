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
        //create naterial
        Materials::create([
            'level' => '1',
            'judul' => 'Belajar Huruf',
            'deskripsi' => '',
            'link' => 'https://www.youtube.com/embed/1qhJqFk7wUc',
        ]);
        Materials::create([
            'level' => '1',
            'judul' => 'Belajar Angka',
            'deskripsi' => '',
            'link' => 'https://www.youtube.com/embed/Rc1S4h2dJ0s',
        ]);
        Materials::create([
            'level' => '1',
            'judul' => 'Menulis Huruf',
            'deskripsi' => '',
            'link' => 'https://www.youtube.com/embed/cQKKRKhC1Yw',
        ]);
        Materials::create([
            'level' => '1',
            'judul' => 'Menulis Angka',
            'deskripsi' => '',
            'link' => 'https://www.youtube.com/embed/SzehfSmzQpY',
        ]);
        Materials::create([
            'level' => '2',
            'judul' => 'Berhitung',
            'deskripsi' => '',
            'link' => 'https://www.youtube.com/embed/Rc1S4h2dJ0s&t=1s',
        ]);
    }
}

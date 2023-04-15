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
            'judul' => 'Berhitung',
            'deskripsi' => 'Test',
            'link' => 'https://www.youtube.com/embed/watch?v=QH2-TGUlwu4',
        ]);
        Materials::create([
            'level' => '1',
            'judul' => 'Membaca',
            'deskripsi' => 'Test',
            'link' => 'https://www.youtube.com/embed/watch?v=QH2-TGUlwu4',
        ]);
        Materials::create([
            'level' => '2',
            'judul' => 'Menulis',
            'deskripsi' => 'Test',
            'link' => 'https://www.youtube.com/embed/watch?v=QH2-TGUlwu4',
        ]);
    }
}

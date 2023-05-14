<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tekatekis;

class TekaTekiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Tekatekis::create([
            'pertanyaan' => 'Apa nama hewan yang memiliki 4 kaki dan berbulu?',
            'a' => 'Kucing',
            'b' => 'Burung',
            'c' => 'Ayam',
            'kunci' => 'a'
        ]);
        Tekatekis::create([
            'pertanyaan' => 'Apa nama hewan yang memiliki 2 kaki dan bertelur?',
            'a' => 'Kucing',
            'b' => 'Burung',
            'c' => 'Ayam',
            'kunci' => 'b'
        ]);
        Tekatekis::create([
            'pertanyaan' => 'Apa nama hewan yang memiliki 2 kaki dan bisa terbang?',
            'a' => 'Pingguin',
            'b' => 'Burung',
            'c' => 'Tikus',
            'kunci' => 'c'
        ]);

    }
}

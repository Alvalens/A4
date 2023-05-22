<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TodoList;

class TodoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create todo
        TodoList::create([
            'user' => 'Admin',
            'title' => 'deadline web',
            'start' => '2023-05-25',
            'end' => '2023-05-26',
            'created_at' => '2023-05-22 02:23:52',
            'updated_at' => '2023-05-22 02:23:52',
        ]);
        TodoList::create([
            'user' => 'Admin',
            'title' => 'Njir libur',
            'start' => '2023-05-31',
            'end' => '2023-06-01',
            'created_at' => '2023-05-22 02:24:08',
            'updated_at' => '2023-05-22 02:24:08',
        ]);
        TodoList::create([
            'user' => 'Guru',
            'title' => 'Njir libur',
            'start' => '2023-05-31',
            'end' => '2023-06-01',
            'created_at' => '2023-05-22 02:24:08',
            'updated_at' => '2023-05-22 02:24:08',
        ]);

    }
}

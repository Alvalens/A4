<?php

namespace App\Http\Controllers;

use App\Models\Materials;
use Illuminate\Http\Request;

class Siswa extends Controller
{
    //return view belajar
    public function belajar()
    {
        // get all data from materies
        $materies = Materials::all();
        return view('belajar',
            compact('materies')
        );
    }

    //return view bermain
    public function bermain()
    {
        return view('bermain');
    }

}

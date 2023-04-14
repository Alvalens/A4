<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Siswa extends Controller
{

    //retu
    //return view belajar
    public function belajar()
    {
        return view('belajar');
    }
    //return view bermain
    public function bermain()
    {
        return view('bermain');
    }

}

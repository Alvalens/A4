<?php

namespace App\Http\Controllers;

use App\Models\Materials;
use Illuminate\Http\Request;

class Siswa extends Controller
{
    //index level
    public function indexlevel()
    {
        //select distinc levels
        $lastLevel = Materials::select('level')->distinct()->orderBy('level', 'desc')->first();
        $lastLevel = $lastLevel->level;
        return view('indexlevel', ['lastLevel' => $lastLevel]);
    }

    // materi
    public function materi($level){
        // select all materi where level = $level
        $materies = Materials::where('level', $level)->get();
        return view('belajar', compact('materies'));
    }
    //return view bermain
    public function bermain()
    {
        return view('bermain');
    }

}

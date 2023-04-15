<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersProgress;
use App\Models\User;

class Ortu extends Controller
{
    // index
    public function index()
    {
        // select user from user that role is siswa
        $Siswa = User::where('role', 'siswa')->get();
        return view('carianak', compact('Siswa'));
    }
    // show data based on id
    public function show($nama_user)
    {
        // get the level last highest level from userprog
        $lastLevel = UsersProgress::select('level')->distinct()->orderBy('level', 'desc')->first();
        $lastLevel = $lastLevel->level;

        // get the user progress
        $userProgress = UsersProgress::where('nama_user', $nama_user)->get();
        // Pass the $userProgress object to the view
        return view('raport', compact('lastLevel', 'nama_user', 'userProgress'));
    }

}

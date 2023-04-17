<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersProgress;
use App\Models\User;

class Ortu extends Controller
{
    // index
    // index
    public function index()
    {
        // Check if authenticated user has role 'ortu'
        if (auth()->user()->role == 'ortu') {
            // Select users with role 'siswa' and matching email
            $Siswa = User::where('role', 'siswa')->where('email', auth()->user()->email)->get();
        } else {
            // Select all users with role 'siswa'
            $Siswa = User::where('role', 'siswa')->get();
        }

        return view('carianak', compact('Siswa'));
    }

    // show data based on id
    public function show($nama_user)
    {
        // if nama user not in database redirect with error
        if (!User::where('name', $nama_user)->exists()) {
            return redirect()->route('ortu.index')->with('error', 'Input tidak valid!');
        }
        // get the level last highest level from userprog where name is name
        $lastLevel = UsersProgress::where('nama_user', $nama_user)->orderBy('level', 'desc')->first();
        $lastLevel = $lastLevel->level;

        // get the user progress
        $userProgress = UsersProgress::where('nama_user', $nama_user)->get();
        // Pass the $userProgress object to the view
        return view('raport', compact('lastLevel', 'nama_user', 'userProgress'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersProgress;
use App\Models\User;
use App\Models\Raport;

class RaportController extends Controller
{
    // index
    public function index()
    {
        if (auth()->user()->role == 'ortu') {
            $Siswa = User::where('role', 'siswa')->where('email', auth()->user()->email)->get();
        } else {
            $Siswa = User::where('role', 'siswa')->get();
        }

        return view('tampilsiswa', compact('Siswa'));
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
        if ($lastLevel == null) {
            return redirect()->route('ortu.index')->with('error', 'Raport kosong!');
        } else {
            $lastLevel = $lastLevel->level;
        }
        $userProgress = UsersProgress::where('nama_user', $nama_user)->get();
        $raportUser = Raport::where('nama', $nama_user)->get()->first();
        $totalSeconds = UsersProgress::where('nama_user', $nama_user)->sum('waktu_belajar');
        $totalMenit = $totalSeconds / 60;
        $totalMenit = round($totalMenit, 2);

        $Siswa = User::where('name', $nama_user)->get()->first();
        $ortu = User::where('email', $Siswa->email)
            ->where('role', 'ortu')
            ->first();
        $namaOrtu = $ortu->name ?? '-';

        return view('raport', compact('lastLevel', 'nama_user', 'userProgress', 'raportUser', 'totalMenit', 'namaOrtu'));
    }

}

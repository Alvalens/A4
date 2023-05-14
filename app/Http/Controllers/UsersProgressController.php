<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersProgress;
use App\Models\Materials;
use Illuminate\Support\Facades\Auth;

class UsersProgressController extends Controller
{
    //
    // store user progress based on ajax request
    public function storeProgress(Request $request)
    {
        // check if role is siswa
        if (Auth::user()->role != 'siswa') {
            return;
        }
        // get user naem
        $name = Auth::user()->name;
        // get materi id
        $materi_id = $request->video_id;
        // get progress
        $progress = $request->watch_time;

        $progressPrecent = $request->watch_percent;
        // get materi
        $materi = Materials::find($materi_id);
        $nMateri = $materi->judul ?? 'unknown';
        $lMateri = $materi->level ?? 0;

        // get usrprg
        $userProgress = UsersProgress::where('nama_materi', $nMateri)
            ->where('nama_user', $name)
            ->first();

        // if user progress is null
        if ($userProgress == null) {
            // create new user progress
            UsersProgress::create([
                'nama_materi' => $nMateri,
                'nama_user' => $name,
                'progress' => $progressPrecent,
                'level' => $lMateri,
                'waktu_belajar' => $progress
            ]);
        } else {
            // update user progress
            $userProgress->update([
                'progress' => $progressPrecent,
                'waktu_belajar' => $progress
            ]);
        }
    }
}

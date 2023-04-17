<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function siswa() {
        //query to fetch data from database
        $data = DB::table('users_progress')
                ->join('parents', 'parents.username_anak', '=', 'users_progress.nama_user')
                ->select('users_progress.id', 'users_progress.waktu_belajar', 'users_progress.nama_user', 'parents.nama')
                ->get();

        return view('datasiswa', ['data' => $data]);
    }
    public function teachers() {
        $teachers = auth()->user();
        return view('akunpengguna', compact('teachers'));        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function siswa()
    {
        // select user where role is siswa, select name and email
        $data = DB::table('users')->where('role', 'siswa')->select('name', 'email')->get();

        return view('datasiswa', ['data' => $data]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ortu extends Controller
{
    //rretuen view('ortu');
    public function index()
    {
        return view('raport');
    }
}

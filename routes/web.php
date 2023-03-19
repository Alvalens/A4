<?php

use App\Http\Controllers\Guru;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
// raport
Route::get('/raport', function () {
    return view('raport');
});
// guru
Route::get('/guru', function () {
    return view('guru');
});

// about
Route::get('/about', function () {
    return view('about');
});
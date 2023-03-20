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

// about
Route::get('/belajar', function () {
    return view('belajar');
});

// about
Route::get('/gurubelajar', function () {
    return view('gurubelajar');
});

// about
Route::get('/login', function () {
    return view('login');
});

// about
Route::get('/index2', function () {
    return view('index2');
});

Route::get('/bermain', function () {
    return view('bermain');
});

use App\Http\Controllers\ContentController;

Route::post('/add-content', 'App\Http\Controllers\ContentController@addContent')->name('addContent');


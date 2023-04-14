<?php

use App\Http\Controllers\Guru;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siswa;
use App\Http\Controllers\Ortu;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\MaterialsController;

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

// belajar controller
Route::get('/belajar', 'App\Http\Controllers\Siswa@belajar');

// about
Route::get('/gurubelajar', function () {
    return view('gurubelajar');
});

// about
Route::get('/login', function () {
    return view('login');
});

// ! crud materi
Route::post('/kirim', 'App\Http\Controllers\MaterialsController@store')->name('kirim');
Route::get('/gurubelajar', 'App\Http\Controllers\MaterialsController@index')->name('gurubelajar');
Route::delete('/materi/{materi}', 'App\Http\Controllers\MaterialsController@destroy')->name('materi.destroy');
Route::patch('/materials/{id}', 'App\Http\Controllers\MaterialsController@update')->name('materials.update');


// teka-teki
Route::get('/teka-teki', function () {
    return view('teka-teki');
});
// bermain controller
Route::get('/bermain', 'App\Http\Controllers\Siswa@bermain');




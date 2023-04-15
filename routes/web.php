<?php

use App\Http\Controllers\Guru;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siswa;
use App\Http\Controllers\Ortu;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;

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
})->name('index');

// raport
// Route::get('/raport', function () {
//     return view('raport');
// });
// guru
Route::get('/guru', function () {
    return view('guru');
});

// about
Route::get('/about', function () {
    return view('about');
});

// belajar controller
Route::get('/belajar', 'App\Http\Controllers\Siswa@indexlevel')->name('level');
Route::get('/belajar/{level}', 'App\Http\Controllers\Siswa@materi')->name('materi');


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

// account
// register user controlelr
Route::get('/register', 'App\Http\Controllers\UsersController@index')->name('loginpage');
Route::post('/register', 'App\Http\Controllers\UsersController@store')->name('register.store');
Route::post('/loginuser', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');


// sementara
Route::get('/sementara','App\Http\Controllers\Ortu@index')->name('ortu.index');
// show raport
Route::get('/raport/{nama}', 'App\Http\Controllers\Ortu@show')->name('raport');



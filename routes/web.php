<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TekatekisController;
use App\Http\Controllers\Siswa;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckRole;


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

// INDEX
Route::get('/', function () {
    return view('index');
})->name('index');

// raport
Route::get('/raport', function () {
     return view('raport');
});

// guru
Route::get('/guru', function () {
    return view('guru');
});

// ROUTE HOME
Route::get('/bermain', function () {
    return view('bermain');
})->name('bermain');
Route::get('/puzzle', function () {
    return view('puzzle');
});
Route::get('/maze', function () {
    return view('maze');
});
Route::get('/teka-teki', [TekatekisController::class, 'showQuestion'])->name('tekateki');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/profile', function () {
    return view('profile');
})->name('profile');


Route::prefix('/dashboard')->middleware(['auth', 'CheckRole:guru,admin'])->group(function () {
    Route::get('/', function () {
        return view('dasbor');
    })->name('dasbor');

    // ! CRUD AKUN
    Route::get('/akunpengguna', [UsersController::class, 'show'])->name('akun.index');
    Route::post('/akun', [UsersController::class, 'store'])->name('akun.store');
    Route::get('/akunpengguna/{nama}/edit', [UsersController::class, 'edit'])->name('akun.edit');
    Route::delete('/akunpengguna/{id}', [UsersController::class, 'destroy'])->name('akun.destroy');
    Route::patch('/akunpengguna/{id}', [UsersController::class, 'update'])->name('akun.update');

    // ! CRUD MATERI
    Route::get('/datamateri', [MaterialsController::class, 'index'])->name('datamateri');
    Route::post('/materials', [MaterialsController::class, 'store'])->name('materials.store');
    Route::get('/datamateri/{materi}', [MaterialsController::class, 'show'])->name('materials.show');
    Route::patch('/datamateri/{materi}', [MaterialsController::class, 'update'])->name('materials.update');
    Route::delete('/datamateri/{materi}', [MaterialsController::class, 'destroy'])->name('materials.destroy');

    // ! CRUD TEKA-TEKI
    Route::get('/datatekateki', [TekatekisController::class, 'index'])->name('datatekateki');
    Route::post('/tekatekis', [TekatekisController::class, 'store'])->name('tekatekis.store');
    Route::get('/datatekateki/{question}', [TekatekisController::class, 'show'])->name('tekatekis.show');
    Route::patch('/', [TekatekisController::class, 'update'])->name('tekatekis.update');
    Route::delete('/datatekateki/{question}', [TekatekisController::class, 'destroy'])->name('tekatekis.destroy');

    // ! CRUD SISWA
    Route::get('/datasiswa', [OrdersController::class, 'siswa'])->name('datasiswa');
});


// ! BELAJAR
Route::get('/belajar', [Siswa::class, 'indexlevel'])->name('level');
Route::get('/belajar/{level}', [Siswa::class, 'materi'])->name('materi');


// ! CRUD REGISTRASI
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/register', [UsersController::class, 'store'])->name('register.store');
    Route::post('/loginuser', [AuthController::class, 'login'])->name('login.proses');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


// ! RAPORT
Route::get('/daftarsiswa','App\Http\Controllers\Ortu@index')->name('ortu.index')->middleware(['auth', 'CheckRole:guru,admin,ortu']);
// show raport
Route::get('/raport/{nama}', 'App\Http\Controllers\Ortu@show')->name('raport')->middleware(['auth', 'CheckRole:guru,admin']);
// update
Route::post('/raport/update', 'App\Http\Controllers\Siswa@storeRaport')->name('raport.store')->middleware(['auth', 'CheckRole:guru,admin']);

// ! VERIFIKASI EMAIL
Route::post('/verification', 'App\Http\Controllers\Siswa@sendverif')->name('email.send');
Route::get('/verify/{code}/{email}', 'App\Http\Controllers\Siswa@verify')->name('email.verify');
Route::delete('/delete/email', 'App\Http\Controllers\Siswa@deleteEmail')->name('email.delete');

// ! USER PROGRESS
Route::post('/user_progress', 'App\Http\Controllers\Siswa@storeProgress')->name('progress.store');
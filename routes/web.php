<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TekatekisController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UsersProgressController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;



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


// ! ROUTE HOME
Route::prefix('/')->middleware(['check.login'])->group(function () {
    // ! BERMAIN
    Route::prefix('/bermain')->group(function () {
        Route::get('/', function () {
            return view('bermain');
        })->name('bermain');
        Route::get('/tower-block', function () {
            return view('games.towerBlock');
        })->name('tower');
        Route::get('/menja', function () {
            return view('games.menja');
        })->name('menja');
        Route::get('/coloron', function () {
            return view('games.coloron');
        })->name('coloron');
        Route::get('/memory', function () {
            return view('games.memory');
        })->name('memory');
        Route::get('/puzzle', function () {
            return view('games.puzzle');
        })->name('puzzle');
    });
    // ! TEKA TEKI
    Route::get('/teka-teki', [TekatekisController::class, 'showQuestion'])->name('tekateki');

    // ! profile
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::post('/profile/delete', [ProfileController::class, 'delete'])->name('profile.delete');
    Route::post('/profile/email', [ProfileController::class, 'editEmail'])->name('profile.email');

    // ! BELAJAR
    Route::get('/belajar', [SiswaController::class, 'indexlevel'])->name('level');
    Route::get('/belajar/{level}', [SiswaController::class, 'materi'])->name('materi');
});



Route::prefix('/dashboard')->middleware(['check.login', 'CheckRole:guru,admin'])->group(function () {
    Route::get('/', function () {
        return view('dasbor');
    })->name('dasbor');

    // ! CRUD AKUN
    Route::middleware('CheckRole:admin')->group(function () {
        Route::get('/akunpengguna', [UsersController::class, 'show'])->name('akun.index');
        Route::post('/akunpengguna/store', [UsersController::class, 'store'])->name('akun.store');
        Route::get('/akunpengguna/{nama}/edit', [UsersController::class, 'edit'])->name('akun.edit');
        Route::delete('/akunpengguna/{id}', [UsersController::class, 'destroy'])->name('akun.destroy');
        Route::patch('/akunpengguna/{id}', [UsersController::class, 'update'])->name('akun.update');
    });

    // ! CRUD MATERI
    Route::get('/datamateri', [MaterialsController::class, 'index'])->name('datamateri');
    Route::post('/materials', [MaterialsController::class, 'store'])->name('materials.store');
    Route::get('/datamateri/{materi}', [MaterialsController::class, 'show'])->name('materials.show');
    Route::patch('/datamateri/{materi}/update', [MaterialsController::class, 'update'])->name('materials.update');
    Route::delete('/datamateri/{materi}', [MaterialsController::class, 'destroy'])->name('materials.destroy');

    // ! CRUD TEKA-TEKI
    Route::get('/datatekateki', [TekatekisController::class, 'index'])->name('datatekateki');
    Route::post('/tekatekis', [TekatekisController::class, 'store'])->name('tekatekis.store');
    Route::get('/datatekateki/{question}', [TekatekisController::class, 'show'])->name('tekatekis.show');
    Route::patch('/', [TekatekisController::class, 'update'])->name('tekatekis.update');
    Route::delete('/datatekateki/{question}', [TekatekisController::class, 'destroy'])->name('tekatekis.destroy');

    // ! CRUD SISWA
    Route::get('/datasiswa', [SiswaController::class, 'show'])->name('datasiswa');
    Route::post('/datasiswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/datasiswa/{nama}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::delete('/datasiswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::patch('/datasiswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');


});
// ! TODO LIST
Route::controller(TodoController::class)->group(function () {
    Route::get('fullcalender', 'index');
    Route::post('fullcalenderAjax', 'ajax');
    Route::get('kegiatan', 'getKegiatan');
})->middleware(['check.login', 'CheckRole:guru,admin']);

// ! CRUD REGISTRASI
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
    Route::post('/loginuser', [AuthController::class, 'login'])->name('login.proses');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ! RAPORT
Route::get('/daftarsiswa', 'App\Http\Controllers\RaportController@index')->name('ortu.index')->middleware(['check.login', 'CheckRole:guru,admin,ortu']);
// show raport
Route::get('/raport/{nama}', 'App\Http\Controllers\RaportController@show')->name('raport')->middleware(['check.login', 'CheckRole:guru,admin,ortu']);
// update
Route::post('/raport/update', [SiswaController::class, 'storeRaport'])->name('raport.store')->middleware(['check.login', 'CheckRole:guru,admin']);

// ! VERIFIKASI EMAIL siswa
Route::prefix('/profil')->middleware(['check.login', 'CheckRole:siswa'])->group(function () {
    Route::post('/verification', [SiswaController::class, 'sendverif'])->name('email.send');
    Route::delete('/delete/email', [SiswaController::class, 'deleteEmail'])->name('email.delete');
});
Route::get('/verify/{code}/{email}', [SiswaController::class, 'verify'])->name('email.verify');

// ! USER PROGRESS
Route::post('/user_progress', [UsersProgressController::class, 'storeProgress'])->name('progress.store')->middleware(['check.login', 'CheckRole:siswa']);

Route::get('/start', [WelcomeController::class, 'index'])->name('start');
Route::post('/start', [WelcomeController::class, 'index'])->name('start');

    // ! route lupa password
Route::middleware('guest')->group(function () {
    Route::get('/lupa-password', [AuthController::class, 'lupaPassword'])->name('lupa.password');
    Route::post('/lupa-password/proses', [AuthController::class, 'lupaPasswordProses'])->name('lupa.proses');
    Route::get('/lupa-password/reset-password/{token}/{name}', [AuthController::class, 'resetPassword'])->name('password.reset');
    Route::post('/lupa-password/reset-password/proses', [AuthController::class, 'resetPasswordProses'])->name('reset.proses');
});


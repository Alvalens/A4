<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\TekatekisController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UsersController;

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
Route::get('/beranda', function () {
    return view('index');
})->name('beranda');
// Route::get('/belajar', function () {
//     return view('belajar');
// })->name('belajar');
Route::get('/bermain', function () {
    return view('bermain');
})->name('bermain');
Route::get('/tekateki', function () {
    return view('teka-teki');
})->name('tekateki');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/login', function () {
    return view('login');
});

//belajar controller
Route::get('/belajar', 'App\Http\Controllers\Siswa@indexlevel')->name('level');
Route::get('/belajar/{level}', 'App\Http\Controllers\Siswa@materi')->name('materi');

// ROUTE DASBOR
Route::get('/dasbor', function () {
    return view('dasbor');
})->name('dasbor');
Route::get('/datasiswa', function () {
    return view('datasiswa');
})->name('datasiswa');
Route::get('/datamateri', function () {
    return view('datamateri');
})->name('datamateri');
Route::get('/datatekateki', function () {
    return view('datatekateki');
})->name('datatekateki');
Route::get('/pengaturanakun', function () {
    return view('pengaturanakun');
})->name('pengaturanakun');
// Route::get('/akunpengguna', function () {
//     return view('akunpengguna');
// })->name('akunpengguna');

// ! CRUD AKUN
Route::get('/akunpengguna', [UsersController::class, 'show'])->name('akun.index');
// edit
Route::get('/akunpengguna/{nama}/edit', [UsersController::class, 'edit'])->name('akun.edit');
// delete
Route::delete('/akunpengguna/{id}', [UsersController::class, 'destroy'])->name('akun.destroy');
// update
Route::patch('/akunpengguna/{id}', [UsersController::class, 'update'])->name('akun.update');

// ! CRUD MATERI
Route::get('/datamateri', [MaterialsController::class, 'index'])->name('datamateri');
Route::post('/materials', [MaterialsController::class, 'store'])->name('materials.store');
Route::get('/datamateri/{materi}', [MaterialsController::class, 'show'])->name('materials.show');
Route::patch('/', [MaterialsController::class, 'update'])->name('materials.update');
Route::delete('/datamateri/{materi}', [MaterialsController::class, 'destroy'])->name('materials.destroy');

// ! CRUD TEKA-TEKI
Route::get('/datatekateki', [TekatekisController::class, 'index'])->name('datatekateki');
Route::post('/tekatekis', [TekatekisController::class, 'store'])->name('tekatekis.store');
Route::get('/datatekateki/{question}', [TekatekisController::class, 'show'])->name('tekatekis.show');
Route::patch('', [TekatekisController::class, 'update'])->name('tekatekis.update');
Route::delete('/datatekateki/{question}', [Tekatekiscontroller::class, 'destroy'])->name('tekatekis.destroy');
Route::get('/teka-teki', [Tekatekiscontroller::class, 'showQuestion']);

// ! CRUD SISWA
Route::get('/datasiswa', [OrdersController::class, 'siswa'])->name('datasiswa');

// bermain controller
//Route::get('/bermain', 'App\Http\Controllers\Siswa@bermain');

// account
// register user controlelr
Route::get('/login', 'App\Http\Controllers\UsersController@index')->name('loginpage');
Route::post('/register', 'App\Http\Controllers\UsersController@store')->name('register.store');
Route::post('/loginuser', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');


// sementara
Route::get('/sementara','App\Http\Controllers\Ortu@index')->name('ortu.index');
// show raport
Route::get('/raport/{nama}', 'App\Http\Controllers\Ortu@show')->name('raport');

// route to profile
Route::get('/profile', function () {
    return view('profile');
})->name('profile');
// ! send verification email
Route::post('/verification', 'App\Http\Controllers\Siswa@sendverif')->name('email.send');
// verify email
Route::get('/verify/{code}/{email}', 'App\Http\Controllers\Siswa@verify')->name('email.verify');
// delete
Route::delete('/delete/email', 'App\Http\Controllers\Siswa@deleteEmail')->name('email.delete');

// ! user progress
Route::post('/user_progress', 'App\Http\Controllers\Siswa@storeProgress')->name('progress.store');


Route::get('/puzzle', function () {
    return view('puzzle'); // Mengirimkan view bernama 'puzzle' sebagai respons
});
Route::get('/maze', function () {
    return view('maze'); // Mengirimkan view bernama 'maze' sebagai respons
});

// Route::get('/puzzle', function () {
//     return view('bermain');
// });

// Route::get('/maze', function () {
//     return view('bermain');
// });

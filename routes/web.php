<?php

use App\Http\Controllers\Guru;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Siswa;
use App\Http\Controllers\Ortu;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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



Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});
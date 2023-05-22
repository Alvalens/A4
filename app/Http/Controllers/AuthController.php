<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ResetPass;
use Carbon\Carbon;




class AuthController extends Controller
{

    //login form
    public function loginForm()
    {
        return view('auth.login');
    }
    // login
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'logusername' => 'required',
            'logpass' => 'required',
        ],
        [
            'logusername.required' => 'Username harus diisi',
            'logpass.required' => 'Password harus diisi',
        ]);


        if (auth()->attempt(['name' => $validatedData['logusername'], 'password' => $validatedData['logpass']])) {
            $request->session()->regenerate();
            $user = auth()->user();
            if ($user->role == 'siswa') {
                return redirect()->route('index');
            } elseif ($user->role == 'ortu') {
                return redirect()->route('ortu.index');
            } elseif ($user->role == 'guru') {
                return redirect()->route('dasbor');
            } elseif ($user->role == 'admin') {
                return redirect()->route('dasbor');
            }
        }

        return back()->withErrors([
            'logusername' => 'Username atau password salah',
            'logpass' => 'Username atau password salah',
        ])->withInput();
    }
    //logout
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    // lupa password
    public function lupaPassword()
    {
        return view('auth.pass');
    }
    // lupa password prosses

    public function lupaPasswordProses(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'nama' => 'required',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'nama.required' => 'Nama harus diisi',
        ]);
        $user = User::where('email', $validatedData['email'])->where('name', $validatedData['nama'])->first();

        if ($user) {
            $emailExist = PasswordResetToken::where('email', $validatedData['email'])
            ->where('nama', $validatedData['nama'])
            ->first();

            if ($emailExist) {
                // Check if the token was generated within the last 5 minutes
                $tokenCreatedAt = Carbon::parse($emailExist->created_at);
                $currentDateTime = Carbon::now();

                if ($tokenCreatedAt->diffInMinutes($currentDateTime) <= 5) {
                    return redirect()->route('lupa.password')->with('error', 'Permintaan reset password sudah dilakukan dalam 5 menit terakhir');
                }
                $emailExist->delete();
            }
            $token = new PasswordResetToken();
            $token->email = $validatedData['email'];
            $token->nama = $validatedData['nama'];
            $token->token = Str::random(40);
            $token->save();

            $resetEmail = new ResetPass($token->token, $validatedData['nama']);
            Mail::to($validatedData['email'])->send($resetEmail);

            // Redirect
            return redirect()->route('lupa.password')->with('success', 'Email telah dikirim');
        } else {
            return redirect()->route('lupa.password')->with('error', 'Email atau nama tidak ditemukan');
        }
    }

    // reset password
    public function resetPassword($token, $nama)
    {
        $token = PasswordResetToken::where('token', $token)->where('nama', $nama)->first();
        if ($token){
            return view('auth.pass-reset', ['token' => $token]);
        } else {
            return redirect()->route('lupa.password')->with('error', 'Token tidak ditemukan');
        }
    }
    // reset password proses
    public function resetPasswordProses(Request $request)
    {
        $validatedData = $request->validate([
            'newpass' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/',
            'confirmpass' => 'required|same:newpass',
        ]
        ,[
            'newpass.required' => 'Password harus diisi',
            'newpass.min' => 'Password minimal 8 karakter',
            'confirmpass.required' => 'Konfirmasi password harus diisi',
            'confirmpass.same' => 'Konfirmasi password tidak sama',
        ]);
        // check if token is exist
        $token = PasswordResetToken::where('token', $request->token)->first();
        if ($token){
            $user = User::where('email', $token->email)->first();
            $user->password = Hash::make($validatedData['newpass']);
            $user->save();
            $token->delete();
            // redirect
            return redirect()->route('login')->with('success', 'Password berhasil diubah');
        } else {
            return redirect()->route('lupa.password')->with('error', 'Token tidak ditemukan');
        }
    }

    // register
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'regname' => 'required|unique:users,name',
            'regpass' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/',
            'confirmpass' => 'required|same:regpass',
            'regmail' => 'required_if:user-type-back,ortu|email|unique:user,email',
        ], [
            'regname.required' => 'Nama harus diisi',
            'regname.unique' => 'Nama telah digunakan',
            'regpass.required' => 'Password harus diisi',
            'regpass.regex' => 'Password harus mengandung 1 huruf besar, 1 huruf kecil, dan 1 angka',
            'confirmpass.required' => 'Konfirmasi password anda',
            'confirmpass.same' => 'Password tidak sama',
            'regmail.required' => 'Email harus diisi untuk Orang Tua',
            'regmail.email' => 'Email tidak valid',
        ]);

        $userType = $request->input('user-type-back');

        if ($userType === 'siswa') {
            // For siswa
            $user = new User();
            $user->name = $validatedData['regname'];
            $user->password = bcrypt($validatedData['regpass']);
            $user->role = 'siswa';
            $user->email = '';
            $user->save();
        } elseif ($userType === 'ortu') {
            // For ortu
            $user = new User();
            $user->name = $validatedData['regname'];
            $user->email = $validatedData['regmail'];
            $user->password = bcrypt($validatedData['regpass']);
            $user->role = 'ortu'; 
            $user->save();
        }

        // Redirect to login with success message
        return redirect()->route('login')->with('status', 'Register Berhasil! silahkan login');
    }

}

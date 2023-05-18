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




class AuthController extends Controller
{

    //login form
    public function loginForm()
    {
        return view('login');
    }
    // login
    public function login(Request $request)
    {
        // validate input data
        $validatedData = $request->validate([
            'logusername' => 'required',
            'logpass' => 'required',
        ],
        [
            'logusername.required' => 'Username harus diisi',
            'logpass.required' => 'Password harus diisi',
        ]);


        // login logic
        if (auth()->attempt(['name' => $validatedData['logusername'], 'password' => $validatedData['logpass']])) {
            $request->session()->regenerate();
            // Get the authenticated user
            $user = auth()->user();
            // Check the role of the authenticated user
            if ($user->role == 'siswa') {
                // Redirect to home route for siswa
                return redirect()->route('index');
            } elseif ($user->role == 'ortu') {
                // Redirect to report route for ortu
                return redirect()->route('ortu.index');
            } elseif ($user->role == 'guru') {
                // Redirect to report route for guru
                return redirect()->route('dasbor');
            } elseif ($user->role == 'admin') {
                // Redirect to report route for admin
                return redirect()->route('dasbor');
            }
        }

        // Redirect back if login fails with errors and old input
        return back()->withErrors([
            'logusername' => 'Username atau password salah',
            'logpass' => 'Username atau password salah',
        ])->withInput();
    }
    //logout
    public function logout(){
        Auth::logout(); // Log out the currently authenticated user
        return redirect()->route('login'); // Redirect to the login page
    }
    // lupa password
    public function lupaPassword()
    {
        return view('auth.pass');
    }
    // lupa password prosses
    public function lupaPasswordProses(Request $request)
    {
        // validate innput email
        $validatedData = $request->validate([
            'email' => 'required|email',
            'nama' => 'required',
        ]
        ,[
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'nama.required' => 'Nama harus diisi',
        ]);
        // check if user email and name is exist in user
        $user = User::where('email', $validatedData['email'])->where('name', $validatedData['nama'])->first();
        if ($user){
            // check if email and name is exist in password reset token
            $emailExist = PasswordResetToken::where('email', $validatedData['email'])->where('nama', $validatedData['nama'])->first();
            if ($emailExist){
                // delete token
                $emailExist->delete();
            }
            // create token
            $token = new PasswordResetToken();
            $token->email = $validatedData['email'];
            $token->nama = $validatedData['nama'];
            $token->token = Str::random(40);
            $token->save();
            // access token
            $token = $token->token;
            $nama = $validatedData['nama'];
            $resetEmail = new ResetPass($token, $nama);
            Mail::to($validatedData['email'])->send($resetEmail);
            // redirect
            return redirect()->route('lupa.password')->with('success', 'Email telah dikirim');
        } else {
            return redirect()->route('lupa.password')->with('error', 'Email atau nama tidak ditemukan');
        }
    }
    // reset password
    public function resetPassword($token, $nama)
    {
        // check if token is exist
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
        // validate input password
        $validatedData = $request->validate([
            'newpass' => 'required|min:8',
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
            // update password
            $user = User::where('email', $token->email)->first();
            $user->password = Hash::make($validatedData['newpass']);
            $user->save();
            // delete token
            $token->delete();
            // redirect
            return redirect()->route('login')->with('success', 'Password berhasil diubah');
        } else {
            return redirect()->route('lupa.password')->with('error', 'Token tidak ditemukan');
        }
    }
}

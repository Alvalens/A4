<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // login
    public function login(Request $request)
    {
        // validate input data
        $validatedData = $request->validate([
            'logusername' => 'required',
            'logpass' => 'required',
        ]);

        // login logic
        if (auth()->attempt(['name' => $validatedData['logusername'], 'password' => $validatedData['logpass']])) {
            $request->session()->regenerate();
            // Get the authenticated user
            $user = auth()->user();
            // Check the role of the authenticated user
            if ($user->role == 'siswa') {
                // Redirect to home route for siswa
                return redirect()->url('/');
            } elseif ($user->role == 'ortu') {
                // Redirect to report route for ortu
                return redirect()->route('ortu.index');
            }
        }

        // Redirect back if login fails
        return back()->withInput()->withErrors([
            'logusername' => 'Username or password is incorrect.',
        ]);
    }
    //logout
    public function logout(){
        Auth::logout(); // Log out the currently authenticated user
        return redirect()->route('loginpage'); // Redirect to the login page
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //index
    public function index()
    {
        $users = User::all();
        return view('login', compact('users'));
    }

    // register
    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            // Validation rules
            'logusername2' => 'required|unique:users,name',
            'logpass2' => 'required',
            'confirmpass' => 'required|same:logpass2',
            'logemail' => $request->input('user-type-back') === 'orangtua2' ? 'required|email' : '', // Optional email validation for Siswa
        ], [
            // Validation error messages
            'logusername2.required' => 'Nama harus diisi',
            'logusername2.unique' => 'Nama telah digunakan',
            'logpass2.required' => 'Password harus diisi',
            'confirmpass.required' => 'Konfirmasi password anda',
            'confirmpass.same' => 'Password tidak sama',
            'logemail.required' => 'Email harus diisi untuk Orang Tua',
            'logemail.email' => 'Email tidak valid',
        ]);

        // Determine user type based on selected user type
        $userType = $request->input('user-type-back');

        // Create new user record based on user type
        if ($userType === 'murid2') {
            // For siswa
            $user = new User();
            $user->name = $validatedData['logusername2'];
            $user->password = bcrypt($validatedData['logpass2']);
            $user->role = 'siswa'; // Set role as siswa
            $user->email = ''; //default
            $user->save();
        } elseif ($userType === 'orangtua2') {
            // For ortu
            $user = new User();
            $user->name = $validatedData['logusername2'];
            $user->email = $validatedData['logemail'];
            $user->password = bcrypt($validatedData['logpass2']);
            $user->role = 'ortu'; // Set role as ortu
            $user->save();
        }

        // Redirect to login with success message
        return redirect()->route('loginpage')->with('status', 'Register Berhasil! silahkan login');
    }
}

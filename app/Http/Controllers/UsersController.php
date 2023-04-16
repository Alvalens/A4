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
            'logusername' => 'required|unique:users,name',
            'logpass' => 'required',
            'confirmpass' => 'required|same:logpass',
            'logemail' => $request->input('user-type-back') === 'orangtua2' ? 'required|email' : '', // Optional email validation for Siswa
        ], [
            // Validation error messages
            'logusername.required' => 'Nama harus diisi',
            'logusername.unique' => 'Nama telah digunakan',
            'logpass.required' => 'Password harus diisi',
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
            $user->name = $validatedData['logusername'];
            $user->password = bcrypt($validatedData['logpass']);
            $user->role = 'siswa'; // Set role as siswa
            $user->email = ''; //default
            $user->save();
        } elseif ($userType === 'orangtua2') {
            // For ortu
            $user = new User();
            $user->name = $validatedData['logusername'];
            $user->email = $validatedData['logemail'];
            $user->password = bcrypt($validatedData['logpass']);
            $user->role = 'ortu'; // Set role as ortu
            $user->save();
        }

        // Redirect to login with success message
        return redirect()->route('loginpage')->with('success', 'User created successfully!');
    }

}

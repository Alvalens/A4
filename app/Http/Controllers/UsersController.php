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
        $this->validate($request, [
            // Validation rules
            'logusername' => 'required|unique:users,name',
            'logpass' => 'required',
            'confirmpass' => 'required|same:logpass',
            'logemail' => $request->input('user-type-back') === 'orangtua2' ? 'required|email' : '', // Optional email validation for Siswa
        ]);

        // Determine user type based on selected user type
        $userType = $request->input('user-type-back');

        // Create new user record based on user type
        if ($userType === 'murid2') {
            // For siswa
            $user = new User();
            $user->name = $request->input('logusername');
            $user->password = bcrypt($request->input('logpass'));
            $user->role = 'siswa'; // Set role as siswa
            $user->email = ''; //default
            $user->save();
        } elseif ($userType === 'orangtua2') {
            // For ortu
            $user = new User();
            $user->name = $request->input('logusername');
            $user->email = $request->input('logemail');
            $user->password = bcrypt($request->input('logpass'));
            $user->role = 'ortu'; // Set role as ortu
            $user->save();
        }

        // Redirect to login with success message
        return redirect()->route('loginpage')->with('success', 'User created successfully!');
    }

}

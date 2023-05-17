<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Raport;
use App\Models\UsersProgress;
use App\Models\TodoList;


class UsersController extends Controller
{
    //index
    public function index()
    {
        return view('login');
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
        return redirect()->route('login')->with('status', 'Register Berhasil! silahkan login');
    }

    // show all user
    public function show()
    {
        $users = User::all();
        return view('akunpengguna', compact('users'));
    }
    // edit
    public function edit($nama)
    {
        $user = User::select('id', 'name', 'role', 'email', 'password')->where('name', $nama)->first();
        return view('tampilakun', compact('user'));
    }
    // delete
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('akun.index')->with('status', 'Akun berhasil dihapus');
    }
    // update
    public function update(Request $request){
        $user = User::find($request->id);
        // validate
        $validatedData = $request->validate([
            'name' => 'required|unique:users,name,' . $user->id,
            // role field only accept siswa, guru, admin, ortu
            'role' => 'required|in:siswa,guru,admin,ortu',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // update
        if ($user->role === 'siswa') {
            $raport = Raport::where('nama', $user->name)->first();
            if ($raport) {
                $raport->nama = $request->name;
                $raport->save();
            }
            $userProgress = UsersProgress::where('nama_user', $user->name);
            if ($userProgress) {
                // update all user progress with new name
                $userProgress->update(['nama_user' => $request->name]);
            } else if ($user->guru || $user->admin) {
                $todo = TodoList::where('user', $user->name);
                if ($todo) {
                    // update all todo list with new name
                    $todo->update(['user' => $request->name]);
                }
            }
        }
        $user->name = $validatedData['name'];
        $user->role = $validatedData['role'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();
        return redirect()->route('akun.index')->with('status', 'Akun berhasil diupdate');
    }
}


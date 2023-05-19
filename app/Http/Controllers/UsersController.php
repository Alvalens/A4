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

    // store
    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            // Validation rules
            'nama' => 'required|unique:users,name',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/',
            'role' => 'required|in:siswa,guru,admin,ortu',
            'email' => $request->input('role') === 'ortu' || 'admin' || 'guru' ? 'required|email' : '',
        ], [
            // Validation error messages
            'nama.required' => 'Nama harus diisi',
            'nama.unique' => 'Nama telah digunakan',
            'password.required' => 'Password harus diisi',
            'password.regex' => 'Password harus mengandung 1 huruf besar, 1 huruf kecil, dan 1 angka',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
        ]);
        // Create new user
        $user = new User;
        $user->name = $validatedData['nama'];
        $user->password = bcrypt($validatedData['password']);
        $user->role = $validatedData['role'];
        $user->email = $validatedData['email'];
        $user->save();

        // Redirect to login with success message if success or error message if failed
        if ($user) {
            return redirect()->route('akun.index')->with('status', 'Akun berhasil dibuat');
        } else {
            return redirect()->route('akun.index')->with('error', 'Akun gagal dibuat');
        }

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
        if ($user) {
            return redirect()->route('akun.index')->with('status', 'Akun berhasil diubah');
        } else {
            return redirect()->route('akun.index')->with('error', 'Akun gagal diubah');
        }
    }
}


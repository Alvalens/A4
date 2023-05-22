<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function upload(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:500',
        ], [
            'avatar.required' => 'Avatar harus diisi',
            'avatar.image' => 'Avatar harus berupa gambar',
            'avatar.mimes' => 'Avatar harus berupa gambar',
            'avatar.max' => 'Ukuran avatar tidak boleh lebih dari 500KB',
        ]);

        if ($request->hasFile('avatar')) {
            $user = User::find(auth()->user()->id);
            if ($user->picture) {
                Storage::delete('public/avatars/' . $user->picture);
            }

            $filename = auth()->user()->name . '-' . time() . '.' . $request->avatar->extension();
            $request->file('avatar')->storeAs('public/avatars', $filename);

            $user->picture = $filename;
            $user->save();

            return redirect()->route('profile')->with('success', 'gambar berhasil diubah');
        } else {
            return redirect()->route('profile')->with('error', 'gambar gagal diubah');
        }
    }

    // delete
    public function delete()
    {
        $user = User::find(auth()->user()->id);
        $picture = $user->picture;
        $user->picture = null;
        $user->save();
        Storage::delete('public/avatars/' . $picture);
        return redirect()->route('profile')->with('success', 'Avatar berhasil dihapus');
    }
    // edit email
    public function editEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus berupa email',
            'email.unique' => 'Email sudah terdaftar',
        ]);

        $user = User::find(auth()->user()->id);
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile')->with('success', 'Email berhasil diubah');
    }
}

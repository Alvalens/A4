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

            // Delete the old profile picture from storage if it exists
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

}

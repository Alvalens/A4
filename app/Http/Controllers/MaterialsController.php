<?php

namespace App\Http\Controllers;

use App\Models\Materials;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $materies = Materials::all();
    return view('datamateri', compact('materies'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:20',
            'deskripsi' => 'nullable|max:50',
            'link' => 'required|url|regex:/embed/',
            'level' => 'required|numeric',
        ], [
            'judul.required' => 'Judul materi harus diisi',
            'judul.max' => 'Judul materi tidak boleh lebih dari :max karakter',
            'deskripsi.required' => 'Deskripsi materi harus diisi',
            'link.required' => 'Link materi harus diisi',
            'link.url' => 'Link materi tidak valid',
            'link.regex' => 'Link materi tidak valid',
            'level.required' => 'Level materi harus diisi',
        ]);

        $materi = new Materials();
        $materi->judul = $validatedData['judul'];
        $materi->deskripsi = $validatedData['deskripsi'];
        $materi->link = $validatedData['link'];
        $materi->level = $validatedData['level'];
        $materi->save();

        // redirect with flash data to /datamateri
        if ($materi) {
            return redirect()->route('datamateri')->with('status', 'Materi berhasil ditambahkan');
        } else {
            return redirect()->route('datamateri')->with('error', 'Materi gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($materi)
    {
        $result = Materials::find($materi);
        return view('tampilmateri', ['materi' => $result]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materials $materi)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:20',
            'deskripsi' => 'nullable|max:50',
            'link' => 'required|url|regex:/embed/',
            'level' => 'required|numeric',
        ], [
            'judul.required' => 'Judul materi harus diisi',
            'judul.max' => 'Judul materi tidak boleh lebih dari :max karakter',
            'deskripsi.required' => 'Deskripsi materi harus diisi',
            'link.required' => 'Link materi harus diisi',
            'link.url' => 'Link materi tidak valid',
            'link.regex' => 'Link materi tidak valid',
            'level.required' => 'Level materi harus diisi',
        ]);

        // Update only the fields that were included in the validated data
        foreach ($validatedData as $request => $value) {
            $materi->{$request} = $value;
        }

        $materi->save();
        if ($materi) {
            return redirect()->route('datamateri')->with('status', 'Materi berhasil diubah');
        } else {
            return redirect()->route('datamateri')->with('error', 'Materi gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materials $materi)
    {
        $materi->delete();
        return redirect()->route('datamateri');
    }
}
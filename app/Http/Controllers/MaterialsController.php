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
    $validatedData = null; // define this variable to avoid errors in the view
    return view('datamateri', compact('materies', 'validatedData'));
}
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'link' => 'required|url',
            'level' => 'required',
        ], [
            'judul.required' => 'Judul materi harus diisi',
            'judul.max' => 'Judul materi tidak boleh lebih dari :max karakter',
            'deskripsi.required' => 'Deskripsi materi harus diisi',
            'link.required' => 'Link materi harus diisi',
            'link.url' => 'Link materi tidak valid',
            'level.required' => 'Level materi harus diisi',
        ]);

        $materi = new Materials();
        $materi->judul = $validatedData['judul'];
        $materi->deskripsi = $validatedData['deskripsi'];
        $materi->link = $validatedData['link'];
        $materi->level = $validatedData['level'];
        $materi->save();

        return view('datamateri', [
            'materies' => $materi,
            'validatedData' => $validatedData
        ]);
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
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'link' => 'required|url',
            'level' => 'required',
        ], [
            'judul.required' => 'Judul materi harus diisi',
            'judul.max' => 'Judul materi tidak boleh lebih dari :max karakter',
            'deskripsi.required' => 'Deskripsi materi harus diisi',
            'link.required' => 'Link materi harus diisi',
            'link.url' => 'Link materi tidak valid',
            'level.required' => 'Level materi harus diisi',
        ]);

        // Update only the fields that were included in the validated data
        foreach ($validatedData as $request => $value) {
            $materi->{$request} = $value;
        }

        $materi->save();
        return redirect()->route('datamateri');
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
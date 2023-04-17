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
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'link' => 'required|url',
            'level' => 'required',
        ]);

        $materi = new Materials();
        $materi->judul = $validatedData['judul'];
        $materi->deskripsi = $validatedData['deskripsi'];
        $materi->link = $validatedData['link'];
        $materi->level = $validatedData['level'];
        $materi->save();

        return redirect()->route('datamateri');
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
            'judul' => 'max:255',
            'link' => 'url',
            'level' => '',
            'deskripsi' => '',
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

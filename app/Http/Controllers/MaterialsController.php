<?php

namespace App\Http\Controllers;

use App\Models\Materials;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    // index
    public function index()
    {
        $materies = Materials::all();
        return view('datamateri', compact('materies'));
    }

    public function show($materi)
    {
        $result = Materials::find($materi);
        return view('tampilmateri', ['materi' => $result]);
    }
    
    //store
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'link' => 'required|url',
            'level' => 'required',
        ]);

        // Create a new Materi instance with the validated data
        $materi = new Materials();
        $materi->judul = $validatedData['judul'];
        $materi->deskripsi = $validatedData['deskripsi'];
        $materi->link = $validatedData['link'];
        $materi->level = $validatedData['level'];
        // Save the new Materi to the database
        $materi->save();

        // Redirect to a success page or do something else
        return redirect()->route('datamateri');
    }

    // delete
    public function destroy(Materials $materi)
    {
        $materi->delete();
        return redirect()->route('datamateri');
    }

    // update
    public function update(Request $request, Materials $materi)
    {
        // validate first
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

        // Redirect to a success page or return a response
        // You can customize this according to your application logic
        return redirect()->route('datamateri');
    }
}

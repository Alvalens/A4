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
        return view('gurubelajar', compact('materies'));
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
        return redirect()->route('gurubelajar')->with('success', 'Materi created successfully!');
    }
    // delete
    public function destroy($id)
    {
        $materi = Materials::findOrFail($id);
        $materi->delete();

        return redirect()->route('gurubelajar')->with('success', 'Materi deleted successfully!');
    }
    // update
    public function update(Request $request, Materials $material)
    {
        // validate first
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'link' => 'required|url',
            'level' => 'required',
        ]);

        // Update the material model with the validated data
        $material->update($validatedData);
        // Redirect to a success page or return a response
        // You can customize this according to your application logic
        return redirect()->route('gurubelajar')->with('success', 'Material updated successfully.');
    }




}

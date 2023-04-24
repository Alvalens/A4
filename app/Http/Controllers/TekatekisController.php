<?php

namespace App\Http\Controllers;

use App\Models\Tekatekis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TekatekisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Tekatekis::all();
        return view('datatekateki', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pertanyaan' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'kunci' => 'required|in:a,b,c',
        ]);

        $question = new Tekatekis;
        $question->pertanyaan = $validatedData['pertanyaan'];
        $question->a = $validatedData['a'];
        $question->b = $validatedData['b'];
        $question->c = $validatedData['c'];
        $question->kunci = $validatedData['kunci'];
        $question->save();

        return redirect()->route('datatekateki');
    }

    /**
     * Display the specified resource.
     */
    public function show($question)
    {
        $result = Tekatekis::find($question);
        return view('tampiltekateki', ['question' => $result]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tekatekis $question)
    {
        $validatedData = $request->validate([
            'pertanyaan' => '',
            'a' => '',
            'b' => '',
            'c' => '',
            'kunci' => ''
        ]);

        // Update only the fields that were included in the validated data
        foreach ($validatedData as $request => $value) {
            $question->{$request} = $value;
        }

        $question->save();
        return redirect()->route('datatekateki');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tekatekis $question)
    {
        $question->delete();
        return redirect()->route('datatekateki');
    }

    public function showQuestion()
        {
            $questions = DB::table('tekatekis')->inRandomOrder()->limit(3)->get();
        
            return view('teka-teki', compact('questions'));
        }
}
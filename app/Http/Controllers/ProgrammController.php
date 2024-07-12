<?php

namespace App\Http\Controllers;

use App\Models\Programm;
use Illuminate\Http\Request;

class ProgrammController extends Controller
{
    public function index()
    {
        $programm = Programm::all();
        return view("dc.programm.index", [
            "programm" => $programm,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'description_short' => ['required'],
            'description_long' => ['required'],
            'start' => ['required', 'date'],
            'duration' => ['required', 'integer'],
        ]);

        return Programm::create($data);
    }

    public function show(Programm $programm)
    {
        return view("dc.programm.show", [
            "programm" => $programm,
        ]);
    }

    public function update(Request $request, Programm $programm)
    {
        $data = $request->validate([
            'title' => ['required'],
            'description_short' => ['required'],
            'description_long' => ['required'],
            'start' => ['required', 'date'],
            'duration' => ['required', 'integer'],
        ]);

        $programm->update($data);

        return $programm;
    }

    public function destroy(Programm $programm)
    {
        $programm->delete();

        return response()->json();
    }
}

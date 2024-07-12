<?php

namespace App\Http\Controllers;

use App\Models\ProgrammType;
use Illuminate\Http\Request;

class ProgrammTypeController extends Controller
{
    public function index()
    {
        return ProgrammType::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'programm_id' => ['required'],
            'type_id' => ['required'],
        ]);

        return ProgrammType::create($data);
    }

    public function show(ProgrammType $programmType)
    {
        return $programmType;
    }

    public function update(Request $request, ProgrammType $programmType)
    {
        $data = $request->validate([
            'programm_id' => ['required'],
            'type_id' => ['required'],
        ]);

        $programmType->update($data);

        return $programmType;
    }

    public function destroy(ProgrammType $programmType)
    {
        $programmType->delete();

        return response()->json();
    }
}

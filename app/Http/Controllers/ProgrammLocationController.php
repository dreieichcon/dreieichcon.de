<?php

namespace App\Http\Controllers;

use App\Models\ProgrammLocation;
use Illuminate\Http\Request;

class ProgrammLocationController extends Controller
{
    public function index()
    {
        return ProgrammLocation::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'programm_id' => ['required'],
            'location_id' => ['required'],
        ]);

        return ProgrammLocation::create($data);
    }

    public function show(ProgrammLocation $programmLocation)
    {
        return $programmLocation;
    }

    public function update(Request $request, ProgrammLocation $programmLocation)
    {
        $data = $request->validate([
            'programm_id' => ['required'],
            'location_id' => ['required'],
        ]);

        $programmLocation->update($data);

        return $programmLocation;
    }

    public function destroy(ProgrammLocation $programmLocation)
    {
        $programmLocation->delete();

        return response()->json();
    }
}

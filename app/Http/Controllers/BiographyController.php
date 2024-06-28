<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use Illuminate\Http\Request;

class BiographyController extends Controller
{
    public function index()
    {
        return Biography::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'short' => ['required'],
            'long' => ['required'],
        ]);

        return Biography::create($data);
    }

    public function show(Biography $biography)
    {
        return $biography;
    }

    public function update(Request $request, Biography $biography)
    {
        $data = $request->validate([
            'name' => ['required'],
            'short' => ['required'],
            'long' => ['required'],
        ]);

        $biography->update($data);

        return $biography;
    }

    public function destroy(Biography $biography)
    {
        $biography->delete();

        return response()->json();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\FontAwesome;
use Illuminate\Http\Request;

class FontAwesomeController extends Controller
{
    public function index()
    {
        return FontAwesome::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'class' => ['required'],
            'name' => ['required'],
            'category' => ['required'],
        ]);

        return FontAwesome::create($data);
    }

    public function show(FontAwesome $fontAwesome)
    {
        return $fontAwesome;
    }

    public function update(Request $request, FontAwesome $fontAwesome)
    {
        $data = $request->validate([
            'class' => ['required'],
            'name' => ['required'],
            'category' => ['required'],
        ]);

        $fontAwesome->update($data);

        return $fontAwesome;
    }

    public function destroy(FontAwesome $fontAwesome)
    {
        $fontAwesome->delete();

        return response()->json();
    }
}

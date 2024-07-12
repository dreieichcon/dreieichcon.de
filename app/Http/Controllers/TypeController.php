<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return Type::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
        ]);

        return Type::create($data);
    }

    public function show(Type $type)
    {
        return $type;
    }

    public function update(Request $request, Type $type)
    {
        $data = $request->validate([
            'name' => ['required'],
        ]);

        $type->update($data);

        return $type;
    }

    public function destroy(Type $type)
    {
        $type->delete();

        return response()->json();
    }
}

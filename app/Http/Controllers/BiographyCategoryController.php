<?php

namespace App\Http\Controllers;

use App\Models\BiographyCategory;
use Illuminate\Http\Request;

class BiographyCategoryController extends Controller
{
    public function index()
    {
        return BiographyCategory::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'biography_id' => ['required'],
            'category_id' => ['required'],
        ]);

        return BiographyCategory::create($data);
    }

    public function show(BiographyCategory $biographyCategory)
    {
        return $biographyCategory;
    }

    public function update(Request $request, BiographyCategory $biographyCategory)
    {
        $data = $request->validate([
            'biography_id' => ['required'],
            'category_id' => ['required'],
        ]);

        $biographyCategory->update($data);

        return $biographyCategory;
    }

    public function destroy(BiographyCategory $biographyCategory)
    {
        $biographyCategory->delete();

        return response()->json();
    }
}

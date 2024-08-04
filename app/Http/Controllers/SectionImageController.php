<?php

namespace App\Http\Controllers;

use App\Models\SectionImage;
use Illuminate\Http\Request;

class SectionImageController extends Controller
{
    public function index()
    {
        return SectionImage::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'section_id' => ['required'],
            'original_file_name' => ['required'],
            'file_name' => ['required'],
            'alt' => ['required'],
            'copyright' => ['nullable'],
        ]);

        return SectionImage::create($data);
    }

    public function show(SectionImage $sectionImage)
    {
        return $sectionImage;
    }

    public function update(Request $request, SectionImage $sectionImage)
    {
        $data = $request->validate([
            'section_id' => ['required'],
            'original_file_name' => ['required'],
            'file_name' => ['required'],
            'alt' => ['required'],
            'copyright' => ['nullable'],
        ]);

        $sectionImage->update($data);

        return $sectionImage;
    }

    public function destroy(SectionImage $sectionImage)
    {
        $sectionImage->delete();

        return response()->json();
    }
}

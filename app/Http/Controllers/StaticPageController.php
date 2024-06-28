<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function index()
    {
        return StaticPage::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'slug' => ['required'],
            'headline' => ['required'],
            'subheadline' => ['nullable'],
            'text' => ['required'],
        ]);

        return StaticPage::create($data);
    }

    public function show(StaticPage $staticPage)
    {
        return $staticPage;
    }

    public function update(Request $request, StaticPage $staticPage)
    {
        $data = $request->validate([
            'name' => ['required'],
            'slug' => ['required'],
            'headline' => ['required'],
            'subheadline' => ['nullable'],
            'text' => ['required'],
        ]);

        $staticPage->update($data);

        return $staticPage;
    }

    public function destroy(StaticPage $staticPage)
    {
        $staticPage->delete();

        return response()->json();
    }
}

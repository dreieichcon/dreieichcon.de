<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        return Social::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'plattform' => ['required'],
            'href' => ['required'],
            'sort' => ['required', 'integer'],
        ]);

        return Social::create($data);
    }

    public function show(Social $social)
    {
        return $social;
    }

    public function update(Request $request, Social $social)
    {
        $data = $request->validate([
            'plattform' => ['required'],
            'href' => ['required'],
            'sort' => ['required', 'integer'],
        ]);

        $social->update($data);

        return $social;
    }

    public function destroy(Social $social)
    {
        $social->delete();

        return response()->json();
    }
}

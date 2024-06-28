<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        return Hotel::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'distance' => ['nullable'],
            'street' => ['nullable'],
            'zip' => ['nullable'],
            'town' => ['nullable'],
            'phone' => ['nullable'],
            'email' => ['nullable', 'email', 'max:254'],
            'web' => ['nullable'],
        ]);

        return Hotel::create($data);
    }

    public function show(Hotel $hotel)
    {
        return $hotel;
    }

    public function update(Request $request, Hotel $hotel)
    {
        $data = $request->validate([
            'name' => ['required'],
            'distance' => ['nullable'],
            'street' => ['nullable'],
            'zip' => ['nullable'],
            'town' => ['nullable'],
            'phone' => ['nullable'],
            'email' => ['nullable', 'email', 'max:254'],
            'web' => ['nullable'],
        ]);

        $hotel->update($data);

        return $hotel;
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return response()->json();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        return Location::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'map_x' => ['nullable'],
            'map_y' => ['nullable'],
        ]);

        return Location::create($data);
    }

    public function show(Location $location)
    {
        return $location;
    }

    public function update(Request $request, Location $location)
    {
        $data = $request->validate([
            'name' => ['required'],
            'map_x' => ['nullable'],
            'map_y' => ['nullable'],
        ]);

        $location->update($data);

        return $location;
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return response()->json();
    }
}

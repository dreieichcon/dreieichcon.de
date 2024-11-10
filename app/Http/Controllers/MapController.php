<?php

namespace App\Http\Controllers;

use App\Models\Map;

class MapController extends Controller
{
    public function index()
    {
        $maps = Map::all();
        return view('dc.map.index', [
            "maps" => $maps
        ]);
    }

    public function show(Map $map){
        return view('dc.map.show', [
            "map" => $map
        ]);
    }
}

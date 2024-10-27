<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use Illuminate\Http\Request;

class BiographyController extends Controller
{



    public function show(Biography $biography)
    {
        return view("dc.biography.show", [
            "biography" => $biography
        ]);
    }


}

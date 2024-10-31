<?php

namespace App\Http\Controllers;

use App\Models\Programm;
use Illuminate\Http\Request;

class ProgrammController extends Controller
{
    public function index()
    {
        $programm = Programm::all();
        return view("dc.programm.index", [
            "programm" => $programm,
        ]);
    }

    public function show(Programm $programm)
    {
        return view("dc.programm.show", [
            "programm" => $programm,
        ]);
    }

}

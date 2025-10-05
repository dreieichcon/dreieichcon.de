<?php

namespace App\Http\Controllers;

use App\Models\Conservices\Games;
use App\Models\Programm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProgrammController extends Controller
{
    public function index()
    {
        $event_id = "1cd1b999-68bb-4a43-8b8a-b6afbdb0c3cb"; //todo: move to event
        $url = "https://conservices.de/api/event/$event_id/programm";

        $programm = Http::get($url)->json();

        $programm = collect($programm)->map(function ($item) {
            $prog = new Programm();
            $prog->conservices_id = $item['id'];
            $prog->title = $item['title'];
            $prog->start = $item['start'];
            $prog->duration = $item['duration'];
            $prog->location = implode(', ', array_column($item['table'], "name"));
            $prog->label = implode(', ', array_column($item['label'], "name"));
//            $game->accessibility = count(array_filter($item['table'], fn($tab) => $tab["wheelchair_accessible"] == 1)) > 0;

            if (!is_null($item['alias_host']) && strlen($item['alias_host']) > 0) {
                $prog->host = $item['alias_host'];
            } else {
                $prog->host = $item['host']['name'];
            }
            return $prog;
        });


//        $programm = Programm::all()->sortBy("start");
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

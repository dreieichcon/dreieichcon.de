<?php

namespace App\Http\Controllers;

use App\Models\Conservices\Games;
use App\Models\Programm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProgrammController extends Controller
{
    public function index()
    {
        $event_id = "01a06d78-9045-7297-9840-3ace7630d57c"; //todo: move to event

////	$url="https://conservices.de/api/event/$event_id/programm";
        $url = "https://conservices.de/api/convention/$event_id/programms";

        $programm = Http::get($url)->json();

        $programm = collect($programm)->map(function ($item) {
            $prog = new Programm();
            $prog->conservices_id = $item['id'];
            $prog->title = $item['title'];
            $prog->start = Carbon::create($item['start'])->setTimezone(config('app.timezone'));
//            $prog->start = Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z',
//                $item['start'],
//                'UTC')->setTimezone(config('app.timezone'));
            $prog->duration = $item['duration'];
            $prog->location = implode(', ', array_column($item['tables'], "name"));
            $prog->label = implode(', ', array_column($item['tags'], "name"));
//            $game->accessibility = count(array_filter($item['table'], fn($tab) => $tab["wheelchair_accessible"] == 1)) > 0;

           $prog->host = $item['host'];
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

<?php

namespace App\Http\Controllers;

use App\Models\Conservices\Games;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function index()
    {
        $event_id = "01a06d78-9045-7297-9840-3ace7630d57c"; //todo: move to event
        $url = "https://conservices.de/api/convention/$event_id/games";

        $games = Http::get($url)->json();

        $games = collect($games)->map(function ($item) {

            $game = new Games();
            $game->conservices_id = $item['id'];
            $game->title = $item['title'];
            $game->system = $item['system'];
            $game->system_version = $item['system_version'];
            $game->chars = $item['chars'];
            $game->content_note = $item['content_note'];
            $game->teaser = $item['teaser'];
            $game->alias_game_master = $item['game_master'];
            $game->start = Carbon::create($item['start']);
            $game->duration = $item['duration'];
            $game->player_min = $item['player_min'];
            $game->player_max = $item['player_max'];
            $game->players_count = $item['players_count'];
            $game->age_min = $item['age_min'];
            $game->age_max = $item['age_max'];

            $game->language = $item['language'];

            $game->location = implode(', ', array_column($item['tables'], "name"));
            return $game;
        });

       return view("dc.games.index", [
           'games' => $games->sortBy("start_timestamp"),
       ]);
    }


}

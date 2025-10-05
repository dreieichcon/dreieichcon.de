<?php

namespace App\Http\Controllers;

use App\Models\Conservices\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function index()
    {
        $event_id = "1cd1b999-68bb-4a43-8b8a-b6afbdb0c3cb"; //todo: move to event
        $url = "https://conservices.de/api/event/$event_id/game";

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
            $game->alias_game_master = $item['alias_game_master'];
            $game->start = $item['start'];
            $game->duration = $item['duration'];
            $game->player_min = $item['player_min'];
            $game->player_max = $item['player_max'];
            $game->age_min = $item['age_min'];
            $game->age_max = $item['age_max'];
            $game->game_master = $item['game_master'];
            $game->start_timestamp = $item['start_timestamp'];
            $game->player = $item['player'];
            $game->language = $item['language'];
            $game->full = $item['player'] == $item['player_max'];
            $game->location = implode(', ', array_column($item['table'], "name"));
            $game->accessibility = count(array_filter($item['table'], fn($tab) => $tab["wheelchair_accessible"] == 1)) > 0;
            return $game;
        });

       return view("dc.games.index", [
           'games' => $games->sortBy("start_timestamp"),
       ]);
    }


}

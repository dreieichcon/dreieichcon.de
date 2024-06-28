<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    public function run(): void
    {
        Navigation::truncate();
        Navigation::create([
            "name" => "Startseite",
            "sort" => 0,
            "target_special" => "/",
        ]);


        $veranstaltung = Navigation::create([
            "name" => "Veranstaltung",
            "sort" => 1,
        ]);

        $veranstaltung_childs = [
            "Über uns",
            "Der Verein",
            "Wann und wo?",
            "Eintrittspreise",
            "FAQ",
            "Kostüm-/Waffenregeln",
        ];
        for($i = 0; $i < count($veranstaltung_childs); $i++){
            Navigation::create([
                "name" => $veranstaltung_childs[$i],
                "sort" => $i,
                "parent_id" => $veranstaltung->id,
            ]);
        }

       Navigation::create([
            "name" => "Lageplan",
            "sort" => 2,
        ]);

        Navigation::create([
            "name" => "Ausstellende",
            "sort" => 3,
        ]);

        Navigation::create([
            "name" => "Programm",
            "sort" => 4,
            "target_special" => "/programm",
        ]);

        Navigation::create([
            "name" => "Spielrunden",
            "sort" => 5,
            "target_special" => "/games"
        ]);

        Navigation::create([
            "name" => "Turniere",
            "sort" => 6,
        ]);

        Navigation::create([
            "name" => "VIPs",
            "sort" => 7,
        ]);


        Navigation::create([
            "name" => "Übernachtung",
            "sort" => 8,
        ]);

        Navigation::create([
            "name" => "Kooperationen",
            "sort" => 9,
        ]);

        Navigation::create([
            "name" => "Stream",
            "sort" => 10,
        ]);

        Navigation::create([
            "name" => "Kontakt",
            "sort" => 11,
        ]);
    }
}

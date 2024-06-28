<?php

namespace Database\Seeders;

use App\Http\Controllers\SocialController;
use App\Models\Social;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    public function run()
    {
        Social::create([
            "plattform" => "YouTube",
            "href" => "https://www.youtube.com/channel/UCg6udpSdrTC6hStI07qhOFw",
            "sort" => 1
        ]);

        Social::create([
            "plattform" => "Discord",
            "href" => "https://discord.gg/xJVEeRgqJp",
            "sort" => 2
        ]);

        Social::create([
            "plattform" => "Twitch",
            "href" => "https://www.twitch.tv/lurchundlama",
            "sort" => 3
        ]);

        Social::create([
            "plattform" => "Instagram",
            "href" => "https://www.instagram.com/dreieichcon/",
            "sort" => 4
        ]);

        Social::create([
            "plattform" => "Twitter",
            "href" => "https://twitter.com/dreieichcon",
            "sort" => 5
        ]);

        Social::create([
            "plattform" => "Facebook",
            "href" => "https://www.facebook.com/dreieichcon/",
            "sort" => 6
        ]);


    }
}

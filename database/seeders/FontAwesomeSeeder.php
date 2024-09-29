<?php

namespace Database\Seeders;

use App\Models\FontAwesome;
use Illuminate\Database\Seeder;

class FontAwesomeSeeder extends Seeder
{
    public function run(): void
    {

        Fontawesome::truncate();
        $brand_icons =
            [
                "Facebook" => "facebook",
                "Twitter" => "twitter",
                "Instagram" => "instagram",
                "Youtube" => "youtube",
                "Pinterest" => "pinterest",
                "LinkedIn" => "linkedin",
                "TikTok" => "tiktok",
                "GitHub" => "github",
                "Discord" => "discord",
                "WordPress" => "wordpress",
                "Slack" => "slack",
                "Figma" => "figma",
                "Apple" => "apple",
                "Google" => "google",
                "Stripe" => "stripe",
                "Algolia" => "algolia",
                "Docker" => "docker",
                "Windows" => "windows"

            ];

        foreach ($brand_icons as $key => $value) {
            Fontawesome::create(
                [
                    "category" => "brand",
                    "name" => $key,
                    "class" => "fab fa-" .$value,
                ]
            );
        }
    }
}

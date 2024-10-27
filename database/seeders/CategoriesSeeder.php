<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            "author"=>"Autor*in",
            "game_designer"=>"Game Designer",
            "artist"=>"Artists",
            "creator"=>"Content Creator & Community",
            "cosplay"=>"Cosplay",
            "exhibitor"=>"Ausstellende",
            "cooperation" =>"Kooperationen",
        ];

        foreach($categories as $slug => $cat){
            Category::create([
                "name" => $cat,
                "slug" => $slug,
            ]);
        }
    }
}

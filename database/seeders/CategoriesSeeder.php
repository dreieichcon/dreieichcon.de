<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            "Autor*in",
            "Game Designer",
            "Artists",
            "Content Creator & Community",
            "Cosplay",
            "Ausstellende",
            "Kooperationen",
        ];

        foreach($categories as $cat){
            Category::create([
                "name" => $cat
            ]);
        }
    }
}

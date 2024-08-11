<?php

namespace Database\Seeders;

use App\Models\Biography;
use App\Models\Section;
use Illuminate\Database\Seeder;

class OldBiographySeeder extends Seeder
{
    public function run(): void
    {
//check file
        $path = "database/seeders/old_data/";
        $file = "bio.json";

        if (is_file($path . $file)) {
            echo "file $file found\n";
        } else {
            echo "file $file not found. Aborting.";
            die;
        }

        //load file
        $data = file_get_contents($path . $file);



        $json = json_decode($data);

        foreach ($json as $bio) {

            $name = $bio->page_bio_name_de;
            if(is_null($name) || strlen($name) == 0) {
                continue;
            }


            if (Biography::where("name",  $name)->count() > 0) {
                $this->command->warn("  skipping " . $name . " already exists.");
            }else{
                $this->command->info("  importing " . $name);
                Biography::create([
                    "name" => $name,
                    "short" => $bio->page_bio_short_bio_de,
                    "long" => $bio->page_bio_content_de,
                ]);
            }
        }
    }
}

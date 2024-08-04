<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class OldBlogSeeder extends Seeder
{
    public function run(): void
    {
//check file
        $path = "database/seeders/old_data/";
        $file = "blog.json";

        if (is_file($path . $file)) {
            echo "file $file found\n";
        } else {
            echo "file $file not found. Aborting.";
            die;
        }

        //load file
        $data = file_get_contents($path . $file);

        $json = json_decode($data);
        foreach ($json as $blog) {

            $headline = $blog->page_blog_headline_de;
            if(is_null($headline) || strlen($headline) == 0) {
                continue;
            }

            $h2 = $blog->page_blog_subheadline_de;
            if(is_null($h2) || strlen($h2) == 0) {
                continue;
            }

            $body = $blog->page_blog_content_de;
            if(is_null($body) || strlen($body) == 0) {
                continue;
            }

            if (Section::where("h1",  $headline)->count() > 0) {
                $this->command->warn("  skipping " . $headline . " already exists.");
            }else{
                $this->command->info("  importing " . $headline);
                Section::create([
                    "h1" => $headline,
                    "h2" => $blog->page_blog_subheadline_de,
                    "body" => $blog->page_blog_content_de,
                ]);
            }
        }
    }
}

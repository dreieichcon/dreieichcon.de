<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Location;
use App\Models\Programm;
use App\Models\ProgrammLocation;
use App\Models\ProgrammType;
use App\Models\Type;
use Carbon\Carbon;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use function Laravel\Prompts\text;
use function Laravel\Prompts\select;

class ProgrammSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();
        Schema::disableForeignKeyConstraints();
        Programm::truncate();
        Event::truncate();


        Programm::truncate();

            //create Event$table->uuid('id')->primary()->unique();
        //            $table->string('name');
        //            $table->unsignedInteger('year');
        //            $table->dateTime('start');
        //            $table->dateTime('end');
        //            $table->text('open');
        //            $table->string('theme');
        //            $table->string("ticketshop")->nullable();
        //            $table->uuid('user_id')->nullable();
        //            $table->timestamps();

        $event = Event::create([
            "name" => "DreieichCon 2024",
            "year" => 2024,
            "start" => Carbon::create("2024", "11", "16"),
            "end" => Carbon::create("2024", "11", "17"),
            "opening_hours" => "Samstag: 10:00 - 24:00 Uhr \n Sonntag: 10:00 - 18:00 Uhr",
            "theme" => "fire",
            "ticketshop" => "https://pretix.eu/wiric/dc2024/"
        ]);

        $number_of_programms = text(
            label: "How many programm entries should be created?",
            default: 20
        );

        $fake_locations = select(
            label: "Clear locations and fake new?",
            options: ["Yes", "No"],
            default: "Yes",
        );

        $fake_types = select(
            label: "Clear types and fake new?",
            options: ["Yes", "No"],
            default: "Yes",
        );

        if($fake_types == "Yes"){
            Type::truncate();
          for($i = 0; $i < 10; $i ++){
              Type::create(["name" => $faker->word]);
          }
        }

        if($fake_locations == "Yes"){
            Location::truncate();
            for($i = 0; $i < 10; $i ++){
                Location::create(["name" => $faker->word]);
            }
        }

        Programm::factory()
            ->count($number_of_programms)
            ->create([
                "event_id" => $event->id,
            ]);


        foreach(Programm::all() as $prog){
            ProgrammLocation::create([
                "programm_id" => $prog->id,
                "location_id" => Location::all()->shuffle()->first()->id
            ]);
            ProgrammLocation::create([
                "programm_id" => $prog->id,
                "location_id" => Location::all()->shuffle()->first()->id
            ]);

            ProgrammType::create([
                "programm_id" => $prog->id,
                "type_id" => Type::all()->shuffle()->first()->id,
            ]);
        }


        Schema::enableForeignKeyConstraints();

    }
}

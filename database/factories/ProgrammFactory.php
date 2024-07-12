<?php

namespace Database\Factories;

use App\Models\Programm;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProgrammFactory extends Factory
{
    protected $model = Programm::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => $this->faker->realText(),
            'description_short' => $this->faker->realText(),
            'description_long' => $this->faker->realText(4500),
            'start' => Carbon::now()->addMinutes($this->faker->randomNumber()),
            'duration' => $this->faker->randomNumber(),
        ];
    }
}

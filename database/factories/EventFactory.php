<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($maxNbChars = 12),
            'description' => $this->faker->text($maxNbChars = 200),
            'venue' => $this->faker->text($maxNbChars = 20),
            'start_time'  => $start = $this->faker->dateTimebetween('+ 1 week', '+3 months'),
            'end_time' => $end = $this->faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s').' +2 days'),
            'capacity' => $this->faker->randomNumber(2),
        ];
    }
}

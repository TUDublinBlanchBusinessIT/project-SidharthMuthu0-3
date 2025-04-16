<?php

namespace Database\Factories;

use App\Models\room;
use Illuminate\Database\Eloquent\Factories\Factory;

class roomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_number' => $this->faker->randomDigitNotNull,
        'room_type' => $this->faker->word,
        'price' => $this->faker->word,
        'is_available' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

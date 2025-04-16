<?php

namespace Database\Factories;

use App\Models\staff;
use Illuminate\Database\Eloquent\Factories\Factory;

class staffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = staff::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->word,
        'last_name' => $this->faker->word,
        'position' => $this->faker->word,
        'phone_number' => $this->faker->word,
        'email' => $this->faker->word,
        'hire_date' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

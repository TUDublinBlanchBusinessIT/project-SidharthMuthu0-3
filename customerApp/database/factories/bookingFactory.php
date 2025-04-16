<?php

namespace Database\Factories;

use App\Models\booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class bookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'guest_id' => $this->faker->randomDigitNotNull,
        'room_number' => $this->faker->randomDigitNotNull,
        'check_in_date' => $this->faker->word,
        'check_out_date' => $this->faker->word,
        'payment_status' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

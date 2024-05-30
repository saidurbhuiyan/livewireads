<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PtcOption>
 */
class PtcOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'timer' => $this->faker->randomDigit(),
            'ppv' => $this->faker->randomFloat(2,3,5),
            'reward' => $this->faker->randomDigit()*10,
            'min_view' => 1000
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\AdsHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdsHistory>
 */
class AdsHistoryFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdsHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ads_id'=> $this->faker->randomDigitNotZero(),
            'site_id'=> $this->faker->randomDigitNotZero(),
            'network_id'=> $this->faker->randomDigitNotZero(),
            'time_taken'=> $this->faker->randomDigitNotZero()*10,
            'clicked'=> $this->faker->boolean,
        ];
    }
}

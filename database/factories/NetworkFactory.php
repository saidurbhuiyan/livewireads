<?php

namespace Database\Factories;

use App\Models\Network;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Network>
 */
class NetworkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Network::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition()
    {
        return [
            'ip' => $this->faker->ipv4,
            'asn' => random_int(100,10000),
            'proxy_score' => $this->faker->randomFloat(2, 0,1),
            'country' => $this->faker->countryCode,
            'isp' => $this->faker->company,
        ];
    }
}

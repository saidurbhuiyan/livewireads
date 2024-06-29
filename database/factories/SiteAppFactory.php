<?php

namespace Database\Factories;

use App\Models\SiteApp;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class SiteAppFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SiteApp::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'site_id' => random_int(1,100),
            'public_key' => $this->faker->md5,
            'private_key'=> $this->faker->sha256,
            'currency_name' => $this->faker->currencyCode(),
            'conversion_rate' => $this->faker->buildingNumber(),
            'is_allow_decimal' => $this->faker->boolean(),
            'postback_url' => $this->faker->url(),
        ];
    }
}

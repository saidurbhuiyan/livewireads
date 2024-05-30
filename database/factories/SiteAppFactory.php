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
    #[ArrayShape(['site_id' => "int", 'public_key' => "string", 'private_key' => "string", 'currency_name' => "string", 'conversion_rate' => "string", 'allow_decimal' => "int", 'postback_url' => "string"])] public function definition(): array
    {
        return [
            'site_id' => random_int(1,100),
            'public_key' => $this->faker->md5,
            'private_key'=> $this->faker->sha256,
            'currency_name' => $this->faker->currencyCode(),
            'conversion_rate' => $this->faker->buildingNumber(),
            'allow_decimal' => random_int(0,1),
            'postback_url' => $this->faker->url(),
        ];
    }
}

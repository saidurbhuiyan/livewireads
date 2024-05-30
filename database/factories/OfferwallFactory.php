<?php

namespace Database\Factories;

use App\Models\Offerwall;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class OfferwallFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offerwall::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    #[ArrayShape(['display_name' => "string", 'secret' => "string", 'api_key' => "string", 'priority' => "int", 'security_risk' => "int", 'frame_url' => "string", 'status' => "bool"])] public function definition(): array
    {
        return [
            'display_name' => $this->faker->name,
            'secret' => $this->faker->sha256,
            'api_key' => $this->faker->md5,
            'priority' => random_int(1,10)*10,
            'security_risk' =>random_int(0,10)*10,
            'frame_url' => $this->faker->url,
            'status' => $this->faker->boolean,
        ];
    }
}

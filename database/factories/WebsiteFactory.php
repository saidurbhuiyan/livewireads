<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Support\Carbon;

/**
 * @extends Factory
 */
class WebsiteFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Website::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'user_id' => random_int(1,11),
            'is_secure' => $this->faker->boolean,
            'domain_name' => $this->faker->domainName(),
            'monthly_traffic' => $this->faker->buildingNumber(),
            'analytic_source' => collect(['google analytics', 'similar_web', 'yandex metrics', 'other'])->random(),
            'domain_verified_at' => now(),
            'status' => collect(['active', 'pending', 'inactive', 'rejected'])->random(),
        ];
    }
}

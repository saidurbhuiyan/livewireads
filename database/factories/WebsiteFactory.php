<?php

namespace Database\Factories;

use App\Models\User;
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
            'user_id' => User::all()->random()->id,
            'is_secure' => $this->faker->boolean,
            'domain_name' => $this->faker->domainName(),
            'monthly_traffic' => $this->faker->buildingNumber(),
            'analytic_source' => random_int(0,3),
            'domain_verified_at' => now(),
            'status' => collect(['active', 'pending', 'inactive', 'rejected'])->random(),
        ];
    }
}

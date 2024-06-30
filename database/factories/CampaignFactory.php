<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'name' => fake()->name(),
            'description' => fake()->sentence(),
            'target_url' => fake()->url(),
            'type' => collect(['banner','pop'])->random(),
            'status' => collect(['pending','active','inactive', 'rejected', 'completed'])->random(),

        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */

    public function configure(): static
    {
        return $this->afterCreating(function (Campaign $campaign) {
            if ($campaign->type === 'banner') {
                $campaign->bannerCampaign()->create([
                    'image_path' => 'https://picsum.photos/200/300',
                ]);
            }
            if ($campaign->type === 'pop') {
                $campaign->popCampaign()->create([
                    'pop_code' => 'script code',
                ]);
            }
        });
    }
}

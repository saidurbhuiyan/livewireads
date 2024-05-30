<?php

namespace Database\Factories;

use App\Models\Shortlink;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class ShortlinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shortlink::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    #[ArrayShape(['display_name' => "string", 'api_url' => "string", 'api_token' => "string", 'count_limit' => "int", 'site_cpm' => "float", 'actual_cpm' => "float", 'priority' => "int", 'time' => "int", 'status' => "bool", 'tag' => 'string'])] public function definition()
    {
        return [
            'display_name' => $this->faker->name,
            'api_url' => $this->faker->url,
            'api_token' => $this->faker->md5,
            'count_limit' => random_int(0,3),
            'site_cpm' => $this->faker->randomFloat(2,3,5),
            'actual_cpm' =>$this->faker->randomFloat(2,1,3),
            'priority' => random_int(1,10)*10,
            'time' =>random_int(10,100),
            'status' => $this->faker->boolean,
            'tag' => serialize([
                'hot' => $this->faker->boolean,
                'pop' => $this->faker->boolean,
                'adult'=> $this->faker->boolean
            ]),
        ];
    }
}

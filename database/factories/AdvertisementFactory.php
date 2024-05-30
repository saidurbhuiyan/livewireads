<?php

namespace Database\Factories;

use App\Models\Advertisement;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertisement>
 */
class AdvertisementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advertisement::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition()
    {
        return [
            'user_id' => random_int(1,11),
            'ptc_id'=> random_int(0,10),
            'banner_id'=>random_int(0,10),
            'title'=>$this->faker->title,
            'description'=>$this->faker->sentence,
            'url'=>$this->faker->url,
            'time'=>random_int(0,10),
            'geo_filter'=>$this->faker->currencyCode,
            'target_geo'=>$this->faker->currencyCode,
            'banner_path'=>$this->faker->imageUrl(),
            'daily_rate'=> $this->faker->randomFloat(2,3,5),
            'days_view'=>random_int(0,10),
            'days_viewed'=>random_int(0,10),
            'click'=>random_int(0,10),
            'cpm'=>$this->faker->randomFloat(2,3,5),
            'views'=>random_int(0,10),
            'viewed'=>random_int(0,10),
            'active'=>$this->faker->boolean,
            'new_tab'=>$this->faker->boolean,
            'status'=>random_int(0,3),
        ];
    }
}

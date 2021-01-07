<?php

namespace Database\Factories;

use Illuminate\Support\Str;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name_ar' => $this->faker->name,
            'name_en' => $this->faker->name,
            'details_ar' => $this->faker->text(),
            'details_en' => $this->faker->text(),
            'price' => rand(1, 200),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Resturant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResturantFactory extends Factory
{
    protected $model = Resturant::class;

    public function definition()
    {
        return [
            // Define your factory attributes here
            'name' => $this->faker->name,
            'lat' => $this->faker->latitude,
            'long' => $this->faker->longitude,
            // Add other attributes as needed
        ];
    }
}

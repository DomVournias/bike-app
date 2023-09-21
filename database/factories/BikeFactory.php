<?php

namespace Database\Factories;

// use App\Models\Bike;
use Illuminate\Database\Eloquent\Factories\Factory;

class BikeFactory extends Factory
{

    public function definition()
    {
        return [
            'bike_name' => $this->faker->word, 
            'brand' => $this->faker->company,  
            'model' => $this->faker->word, 
            'year' => $this->faker->year, 
            'serial_number' => $this->faker->unique()->uuid,
            'user_id' => null, 
        ];
    }
}

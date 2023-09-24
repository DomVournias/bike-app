<?php

namespace Database\Factories;

use App\Models\ServiceRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceRequestFactory extends Factory
{
    protected $model = ServiceRequest::class;

    public function definition()
    {
        $user = User::inRandomOrder()->first();
        $bike = $user->bikes->random();

        return [
            'bike_name' => $bike ? $bike->bike_name : $this->faker->word,
            'task' => $this->faker->sentence,
            'done' => 'Pending', // Set to 'Pending'
            'cost' => $this->faker->randomFloat(2, 10, 1000),
            'user_id' => $user->id,
            'bike_id' => $bike ? $bike->id : null,
        ];
    }
}

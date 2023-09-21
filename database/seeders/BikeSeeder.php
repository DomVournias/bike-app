<?php

namespace Database\Seeders;

use App\Models\Bike;
use App\Models\User;
use Illuminate\Database\Seeder;

class BikeSeeder extends Seeder
{
    
    public function run()
    {
        User::each(function ($user) {
            Bike::factory()->count(10)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ServiceRequest;
use Illuminate\Database\Seeder;

class ServiceRequestSeeder extends Seeder
{
    public function run()
    {
        User::all()->each(function ($user) {
            ServiceRequest::factory()->count(10)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}

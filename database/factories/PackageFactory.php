<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;


class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     *    
     *  
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

          'tracking_number' => fake()->unique()->randomnumber(),
          'weight' => fake()->numberBetween([1,150]),
          'status' => fake()->randomElement(['shipped', 'delivered']),
          'sender_name' => fake()->name(),
          'sender_address' => fake()->address(),
          'receiver_name' => fake()->name(),
          'receiver_address' =>fake()->address(),
        
          'driver_id' => Driver::inRandomOrder()->value('id'),
        ];

    }
}

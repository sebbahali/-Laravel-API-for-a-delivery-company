<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     *  
     * @return array<string, mixed>
     */

   
    public function definition(): array
    {
        $package=Package::inRandomOrder()->first();
        return [
   'order_number'=>fake()->unique()->randomNumber(),
   'status'=>fake()->randomElement(['pending','delivered']),
   'delivery_address'=>fake()->address(),
   'delivery_date'=>fake()->dateTimeBetween('now','+30 days'),

   'package_id'=>$package->id,

   'driver_id' => $package->driver_id,
   
        ];
    }
}

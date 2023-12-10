<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class carsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'carTitle' => fake()->company(),
            'price' => fake()->numberBetween($min = 6000, $max = 12000),        
             'description' => fake()->text(),
            'published' => 1,
            'image' => fake()->imageUrl(800,600),
            
        ];
    }
}

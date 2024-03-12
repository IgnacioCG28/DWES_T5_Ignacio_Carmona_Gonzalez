<?php

namespace Database\Factories;

use App\Models\Box;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {

        return [
            'name' => fake()->name(),
            'description' => fake()->text(40),
            'picture' => fake()->image('storage/app/public/', 640, 480, null, false),
            'price' => fake()->randomNumber(3),
            'box_id' => Box::inRandomOrder()->first()->id
        ];
    }
}

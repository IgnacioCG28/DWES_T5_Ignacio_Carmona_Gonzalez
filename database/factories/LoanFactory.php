<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'item_id' => Item::inRandomOrder()->first()->id,
            'checkout_date' => fake()->dateTimeBetween('-2 years', '-1 years'),
            'due_date'=>fake()->dateTimeBetween('-1 years', 'now'),
            'returned_date' => fake()->dateTimeThisMonth()
        ];
    }
}

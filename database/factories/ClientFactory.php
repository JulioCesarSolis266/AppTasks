<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory()->create()->id,
            'position_id' => \App\Models\Position::factory()->create()->id,
            'branch_id' => \App\Models\Branch::factory()->create()->id,
            'cellphone' => fake()->phoneNumber(),
        ];
    }
}

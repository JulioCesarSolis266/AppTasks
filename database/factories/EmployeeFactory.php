<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
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
            'DNI' => fake()->randomNumber(8),
            'nacionality' => fake()->country,
            'cellphone' => fake()->phoneNumber,
            'bank_account' => fake()->bankAccountNumber,
            'birthdate' => fake()->date,
            'genre_id' => \App\Models\Genre::factory()->create()->id,
            'address' => fake()->address,
            'position_id' => \App\Models\Position::factory()->create()->id,
            'title_id' => \App\Models\Title::factory()->create()->id,
            'salary' => fake()->randomNumber(5),
            'hire_date' => fake()->date,
        ];
    }
}

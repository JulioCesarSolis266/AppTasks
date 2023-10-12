<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id'=> \App\Models\Branch::factory()->create()->id,
            'coordinator_id'=> \App\Models\Coordinator::factory()->create()->id,
            'visit_date'=> fake()->datetime(),
            'task_details'=> fake()->text(),
            'other_data'=> fake()->text(),
            'user_id' => \App\Models\User::factory()->create()->id
        ];
    }
}

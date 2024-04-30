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
            'title' => fake()->name(),
            'coordinator_id'=> \App\Models\Coordinator::factory()->create()->id,
            'visit_date'=> fake()->datetime(),
            'incident_id'=> fake()->numberBetween(1, 100000),
            'task_details'=> fake()->text(),
            'status_id'=> \App\Models\TaskStatus::factory()->create()->id,
            'priority_id'=> \App\Models\TaskPriority::factory()->create()->id,
            'other_data'=> fake()->text(),
            'employee_id' => \App\Models\Employee::factory()->create()->id,
        ];
    }
}

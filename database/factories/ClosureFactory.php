<?php

namespace Database\Factories;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Closure>
 */
class ClosureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number_visits'=>fake()->numberBetween(1,100),
            'visit_date'=>fake()->date(),
            'entry_time'=>fake()->time(),
            'exit_time'=>fake()->time(),
            'workers_number'=>fake()->numberBetween(0,5),
            'tasks_details'=>fake()->text(),
            'hour_cost'=>fake()->numberBetween(1000,999999),
            'hours_number'=>fake()->numberBetween(1,1000),
            'total'=>fake()->numberBetween(1000,999999),
            'kilometers_cost'=>fake()->numberBetween(1000,999999),
            'roundtrip_kilometers'=>fake()->numberBetween(1,1000),
            'total_cost'=>fake()->numberBetween(1000,999999),
            'other_expenses'=>fake()->text(),
            'expenses_cost'=>fake()->numberBetween(1000,999999),
            'material_provided'=>fake()->text(),
            'material_details'=>fake()->text(),
            'quantity'=>fake()->numberBetween(0,100),
            'material_sent'=>fake()->text(),
            'task_id' =>\App\Models\Task::factory()->create()->id
        ];
    }
}

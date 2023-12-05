<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use App\Models\Genre;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Client;
use App\Models\Coordinator;
use App\Models\Task;
use App\Models\Closure;
use App\Models\Position;
use App\Models\Role;
use App\Models\Title;
use App\Models\TaskPriority;
use App\Models\TaskStatus;
use App\Models\Cost;





class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::factory()->create([
            'name' => 'Juan Pablo',
            'surname' => 'Modica',
            'email' => 'jp@jp.com',
            'password' => bcrypt('123456'),
            'role_id' => 1,
        ]);

        User::factory()->create([
            'name' => 'Julio Cesar',
            'surname' => 'Solis Ordinola',
            'email' => 'jc@jc.com',
            'password' => bcrypt('123456'),
            'role_id' => 2,
        ]);

        User::factory()->create([
            'name' => 'Ferretera',
            'surname' => 'San Luis',
            'email' =>'fs@fs.com',
            'password' => bcrypt('123456'),
            'role_id' => 3,
        ]);

        Role::factory(2)->create();

        User::factory(5)->create();

        Company::factory(3)->create();

        Branch::factory(3)->create();

        Coordinator::factory(3)->create();

        Task::factory(3)->create();

        Closure::factory(3)->create();

        Title::factory(3)->create();

        Position::factory(4)->create();

        TaskPriority::factory(2)->create();

        TaskStatus::factory(2)->create();

        Genre::factory(1)->create();

        Employee::factory(3)->create();

        Client::factory(3)->create();

        Cost::factory(3)->create();
    }
}

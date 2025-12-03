<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'project_code' => fake()->unique()->randomNumber(5),
            'sst_date' => fake()->date(),
            'jpict_number' => fake()->randomNumber(5),
            'jpict_approval_date' => fake()->date(),
            'contract_period' => fake()->randomElement(['6 month', '12 month', '24 month']),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'contract_value' => fake()->randomNumber(5),
            'company_name' => fake()->company(),
            'company_pic' => fake()->name(),
            'department_owner' => fake()->word(),
            'project_owner' => fake()->name(),
            'officer_in_charge' => fake()->name(),
            'sealed_date' => fake()->date(),
            'contract_status' => fake()->randomElement(array_keys(Project::statusOptions())),
            'remarks' => fake()->paragraph(),
        ];
    }
}

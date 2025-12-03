<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectAllocation>
 */
class ProjectAllocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => \App\Models\Project::factory(),
            'approved_amount' => $this->faker->randomFloat(2, 1000, 100000),
            'account_code' => $this->faker->bothify('ACCT-####'),
            'approval_date' => $this->faker->optional()->date(),
            'payment_count' => $this->faker->numberBetween(1, 12),
            'payment_months' => implode(',', $this->faker->randomElements(
                ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                $this->faker->numberBetween(1, 12)
            )),
            'notes' => $this->faker->optional()->paragraph(),
        ];
    }
}

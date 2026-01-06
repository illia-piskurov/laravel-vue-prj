<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EducationalProgram>
 */
class EducationalProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department' => fake()->company(),
            'code_and_name' => fake()->name(),
            'name_of_edu_program' => fake()->sentence(3),
            'degree' => fake()->sentence(1),
            'state_catalog' => fake()->sentence(1),
            'year_of_start' => fake()->year(),
        ];
    }
}

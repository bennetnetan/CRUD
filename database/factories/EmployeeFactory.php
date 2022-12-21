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
    public function definition()
    {
        return [
            'fname' => fake()->firstName(),
            'lname' => fake()->lastName(),
            'idnum' => fake()->numberBetween(1, 9999999),
            'email' => fake()->unique()->safeEmail(),
            'office' => fake()->streetName(),
            'imageId' => fake()->numberBetween(1, 9),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'identification' => $this->faker->unique()->numberBetween(100000000, 999999999),
            'name' => $this->faker->name,
            'surname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'birthdate' => $this->faker->dateTimeBetween('-20 years', '-12 years'),
            'address' => $this->faker->address,
            'active' => $this->faker->boolean,
        ];
    }
}

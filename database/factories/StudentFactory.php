<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'          => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'student_id'    => $this->faker->randomDigitNotNull(),
            'address_1'     => $this->faker->country(),
            'address_2'     => $this->faker->streetAddress(),
            'standard_id'   => 1,
        ];
    }
}

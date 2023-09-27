<?php

namespace Database\Factories;

use App\Models\Student;
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

    protected $model = Student::class;

    public function definition(): array
    {

        return [
            'full_name' => $this->faker->name,
            'code' => $this->faker->unique()->randomNumber,
            'date_of_birth' => $this->faker->date,
            'email' => $this->faker->email,
            'level_id' => mt_rand(1, 4), // (1, 2, 3, 4)
        ];
    }
}

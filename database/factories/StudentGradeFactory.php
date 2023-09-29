<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentGrade>
 */
class StudentGradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => $this->faker->numberBetween(1, 20), // Replace with actual student_id generation logic
            'course_id' => $this->faker->numberBetween(1, 5),  // Replace with actual course_id generation logic
            'grade_item_id' => $this->faker->numberBetween(1, 4),  // Replace with actual grade_item_id generation logic
            'grade' => $this->faker->randomFloat(2, 0, 20),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

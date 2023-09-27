<?php

namespace Database\Factories;

use App\Models\Course;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Course::class;
    public function definition(): array
    {

        $CourseNames = ['Mathematics', 'Science', 'History', 'English', 'Computer Science'];
        return [
            'name' => $this->faker->randomElement($CourseNames),
            'code' => $this->faker->unique()->numberBetween(1000, 2000),
            'description' => $this->faker->text(100),

        ];
    }
}

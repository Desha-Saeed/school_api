<?php

namespace Database\Factories;

use App\Models\Enrollment;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    protected $model = Enrollment::class;

    public function definition()
    {
        return [
            'course_id' => function () {
                return Course::factory()->create()->id;
            },
            'student_id' => function () {
                return Student::factory()->create()->id;
            }
        ];
    }
}

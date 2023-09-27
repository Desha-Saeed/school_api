<?php

namespace Database\Factories;

use App\Models\GradeItem;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeItemFactory extends Factory
{
    protected $model = GradeItem::class;

    public function definition()
    {
        return [
            'name' => ['practical exam', 'oral exam', 'midterm exam', 'final exam'],
            'max_degree' => $this->faker->numberBetween(50, 100),
            'course_id' => function () {
                return Course::factory()->create()->id;
            },
        ];
    }
}

<?php

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use App\Models\GradeItem;
// use Illuminate\Database\Seeder;

// class GradeItemSeeder extends Seeder
// {
//     public function run()
//     {


// $items = [
//     [
//         'name' => 'practical exam', 'max_degree' => 20,
//     ],
//     [
//         'name' => 'oral exam', 'max_degree' => 10,
//     ],
//     [
//         'name' => 'midterm exam', 'max_degree' => 20,
//     ],
//     [
//         'name' => 'final exam', 'max_degree' => 50,
//     ],
// ];

// foreach ($items as $item) {

//     $course_id = function () {
//         return Course::factory()->create()->id;
//     };
//     GradeItem::create([
//         'name' => $item['name'],
//         'max_degree' => $item['max_degree'],
//         'course_id' => $course_id
//     ]);
// };

//         GradeItem::factory()->count(4)->create();
//     }
// }




namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\GradeItem;
use App\Models\Course;
use Illuminate\Database\Seeder;

class GradeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::all();

        foreach ($courses as $course) {
            GradeItem::create([
                'name' => 'Oral Exam',
                'max_degree' => 10,
                'course_id' => $course->id,
            ]);

            GradeItem::create([
                'name' => 'Practical Exam',
                'max_degree' => 20,
                'course_id' => $course->id,
            ]);

            GradeItem::create([
                'name' => 'Midterm Exam',
                'max_degree' => 20,
                'course_id' => $course->id,
            ]);

            GradeItem::create([
                'name' => 'Final Exam',
                'max_degree' => 50,
                'course_id' => $course->id,
            ]);
        }
    }
}

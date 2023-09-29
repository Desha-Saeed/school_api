<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\GradeItem;
use App\Models\Student;
use App\Models\StudentGrade;
use Illuminate\Database\Seeder;

class StudentGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::all();
        $students = Student::all();

        foreach ($courses as $course) {
            $gradeItems = GradeItem::where('course_id', $course->id)->get();

            foreach ($students as $student) {
                foreach ($gradeItems as $gradeItem) {
                    StudentGrade::create([
                        'student_id' => $student->id,
                        'course_id' => $course->id,
                        'grade_item_id' => $gradeItem->id,
                        'grade' => rand(0, $gradeItem->max_degree), // Generate a random grade
                    ]);
                }
            }
        }
    }
}

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
        // Retrieve a course and its grade items
        $course = Course::find(2); // Replace with the course ID you want to seed
        $gradeItems = GradeItem::where('course_id', $course->id)->get();
        $existingCodes = Student::pluck('code')->toArray();

        // Seed grades for each student in the course
        $students = Student::whereHas('courses', function ($query) use ($course) {
            $query->where('course_id', $course->id);
        })->get();

        foreach ($students as $student) {
            foreach ($gradeItems as $gradeItem) {
                // Generate random grades (you can adjust this logic)
                $grade = rand(0, $gradeItem->max_degree);
                // Generate a unique code for each student
                do {
                    $code = rand(1000000, 9999999); // Adjust the range as needed
                } while (in_array($code, $existingCodes)); // Check for uniqueness


                // Create a new student grade record
                StudentGrade::create([
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                    'grade_item_id' => $gradeItem->id,
                    'grade' => $grade,
                ]);
            }
        }
    }
}

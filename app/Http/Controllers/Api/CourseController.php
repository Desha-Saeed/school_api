<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use App\Models\StudentGrade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    //get all courses
    public function index(Request $request)
    {
        $courses = Course::all();
        return response()->json($courses, 200);
    }


    // Searching for courses with name and code

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $courses = Course::where('name', 'like', "%$searchTerm%")
            ->orWhere('code', 'like', "%$searchTerm%")
            ->get();
        return response()->json($courses);
    }


    public function getCourseWithStudentGrades($courseId)
    {
        $course = Course::with('students', 'gradeItems')->find($courseId);



        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        $students = $course->students;
        $gradeItems = $course->gradeItems;


        $data = [];
        foreach ($students as $student) {
            $studentGrades = StudentGrade::where('course_id', $course->id)
                ->where('student_id', $student->id)
                ->get()
                ->pluck('grade', 'grade_item_id')
                ->toArray();

            $data[] = [
                'id' => $student,
                'full_name' => $student->full_name,
                'student_code' => $student->code,
                // Add grades for each grade item
                // Assuming $gradeItems is a collection of grade items
                ...$studentGrades,
                'Total' => array_sum($studentGrades),
            ];
        }

        return response()->json(['course' => $course, 'students' => $data], 200);
    }
}

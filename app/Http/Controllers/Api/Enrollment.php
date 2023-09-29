<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Course;

class Enrollment extends Controller
{

    public function addStudentToCourse(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Student::find($request->input('student_id'));
        $course = Course::find($request->input('course_id'));

        if (!$student || !$course) {
            return response()->json(['message' => 'Student or course not found'], 404);
        }

        // Check if the student is already enrolled in the course
        if ($student->courses->contains($course)) {
            return response()->json(['message' => 'Student is already enrolled in the course'], 400);
        }

        $student->courses()->attach($course);

        return response()->json(['message' => 'Student added to the course'], 200);
    }


    // StudentController.php

    public function removeStudentFromCourse(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Student::find($request->input('student_id'));
        $course = Course::find($request->input('course_id'));

        if (!$student || !$course) {
            return response()->json(['message' => 'Student or course not found'], 404);
        }

        // Check if the student is enrolled in the course
        if (!$student->courses->contains($course)) {
            return response()->json(['message' => 'Student is not enrolled in the course'], 400);
        }

        $student->courses()->detach($course);

        return response()->json(['message' => 'Student removed from the course'], 200);
    }
}

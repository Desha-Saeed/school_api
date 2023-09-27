<?php

namespace App\Http\Controllers\Api;

use Illuminate\Validation\ValidationException;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class StudentController extends Controller

{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Student::query();

        // Filter by level
        if ($request->has('level_id')) {
            $query->where('level_id', $request->input('level_id'));
        }

        // Search by code, name, or email
        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->orWhere('code', 'LIKE', $searchTerm)
                    ->orWhere('full_name', 'LIKE', $searchTerm)
                    ->orWhere('email', 'LIKE', $searchTerm);
            });
        }

        $students = $query->get();



        return response()->json([
            'status' => 'success',
            'data' => $students
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'full_name' => 'required',
                'code' => 'required|unique:students',
                'date_of_birth' => 'required|date',
                'email' => 'required|unique:students|email:filter',
                'level_id' => 'required|exists:levels,id',
            ]);

            // Create a new student
            $student = Student::create($validatedData);

            // return success response

            return new StudentResource($student);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'Failed',
                'errors' => $e->errors(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'User not found'], 400);
        }
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, Request $request)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'full_name' => 'required',
                'code' => 'required|unique:students,code,' . $id,
                'date_of_birth' => 'required|date',
                'email' => 'required|email',
                'level_id' => 'required|exists:levels,id',
            ]);

            $student = Student::findOrFail($id);
            $student->update($validatedData);

            return new StudentResource($student);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = Student::find($id);



        if (!$student) {

            return response()->json(['message' => 'User not found'], 400);
        }






        $data = [
            'status' => 'success',
            'message' => 'User Deleted Successfully'
        ];

        return response()->json($data, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // GET /api/students
    public function index()
    {
        return response()
            ->json(Student::all())
            ->setEncodingOptions(JSON_PRETTY_PRINT);
    }

    // GET /api/students/{id}
    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()
                ->json(['message' => 'Student not found!'], 404)
                ->setEncodingOptions(JSON_PRETTY_PRINT);
        }

        return response()
            ->json($student)
            ->setEncodingOptions(JSON_PRETTY_PRINT);
    }

    // POST /api/students (single)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string',
            'email'  => 'required|email|unique:students,email',
            'course' => 'required|string',
        ]);

        $student = Student::create($validated);

        return response()
            ->json($student, 201)
            ->setEncodingOptions(JSON_PRETTY_PRINT);
    }

    // PUT /api/students/{id} — full replace (all fields required)
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()
                ->json(['message' => 'Student not found!'], 404)
                ->setEncodingOptions(JSON_PRETTY_PRINT);
        }

        $validated = $request->validate([
            'name'   => 'required|string',
            'email'  => 'required|email|unique:students,email,' . $id,
            'course' => 'required|string',
        ]);

        $student->update($validated);

        return response()
            ->json($student)
            ->setEncodingOptions(JSON_PRETTY_PRINT);
    }

    // PATCH /api/students/{id} — partial update (only send what you want to change)
    public function patch(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()
                ->json(['message' => 'Student not found!'], 404)
                ->setEncodingOptions(JSON_PRETTY_PRINT);
        }

        $validated = $request->validate([
            'name'   => 'sometimes|string',
            'email'  => 'sometimes|email|unique:students,email,' . $id,
            'course' => 'sometimes|string',
        ]);

        $student->update($validated);

        return response()
            ->json($student)
            ->setEncodingOptions(JSON_PRETTY_PRINT);
    }

    // DELETE /api/students/{id}
    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()
                ->json(['message' => 'Student not found!'], 404)
                ->setEncodingOptions(JSON_PRETTY_PRINT);
        }

        $student->delete();

        return response()
            ->json(['message' => 'Student deleted successfully!'])
            ->setEncodingOptions(JSON_PRETTY_PRINT);
    }

    // DELETE /api/students
    public function destroyAll()
    {
        Student::truncate();

        return response()->json([
            'message' => 'All students deleted successfully!'
        ]);
    }
}

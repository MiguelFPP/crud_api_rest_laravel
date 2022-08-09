<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentCreate;
use App\Http\Requests\StudentUpdate;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    /**
     * It gets all the students from the database and returns them as a JSON response
     *
     * @return JsonResponse A JsonResponse object
     */
    public function getStudents(Request $request): JsonResponse
    {
        try {
            $students = Student::where('active', 1)->paginate(5);
            return response()->json($students, 200);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Error while getting students'], 500);
        }
    }

    /**
     * It gets a student by id
     *
     * @param int id The id of the student you want to get.
     *
     * @return JsonResponse A JSON response with the student data.
     */
    public function getStudent(int $id): JsonResponse
    {
        try {
            $student = Student::find($id);

            if (!$student) {
                return response()->json(['message' => 'Student not found'], 404);
            }
            return response()->json($student, 200);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Error while getting student'], 500);
        }
    }

    /**
     * > It creates a student and returns a JSON response
     *
     * @param StudentCreate request The request object.
     *
     * @return JsonResponse A JsonResponse object
     */
    public function createStudent(StudentCreate $request): JsonResponse
    {
        try {
            $student = Student::create($request->validated());
            return response()->json($student, 201);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Error while creating student'], 500);
        }
    }

    /**
     * It takes a StudentUpdate request, an integer id, and returns a JsonResponse
     *
     * @param StudentUpdate request The request object.
     * @param int id The id of the student to be updated
     *
     * @return JsonResponse A JsonResponse object
     */
    public function updateStudent(StudentUpdate $request, int $id): JsonResponse
    {
        try {
            $student = Student::find($id);

            if (!$student) {
                return response()->json(['message' => 'Student not found'], 404);
            }
            $student->update($request->validated());
            return response()->json($student, 200);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Error while updating student'], 500);
        }
    }

    /**
     * It deletes a student from the database
     *
     * @param int id The id of the student to be deleted
     *
     * @return JsonResponse A JsonResponse object
     */
    public function deleteStudent(int $id):JsonResponse
    {
        try {
            $student = Student::find($id);

            if (!$student) {
                return response()->json(['message' => 'Student not found'], 404);
            }

            $student->delete();
            return response()->json(['message' => 'Student deleted'], 200);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Error while deleting student'], 500);
        }
    }
}

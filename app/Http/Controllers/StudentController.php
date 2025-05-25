<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Student;
use App\Services\StudentService;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index(): View
    {
        $students = $this->studentService->getAll();
        return view('students.index', compact('students'));
    }

    public function create(): View
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'course' => 'required|string|max:100',
        ]);

        $this->studentService->store($data);
        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function show($id): View
    {
        $student = $this->studentService->getById($id);
        if (!$student) abort(404);
        return view('students.show', compact('student'));
    }

    public function edit(Student $student): View
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:students,email,' . $student->id,
            'course' => 'sometimes|string|max:100',
        ]);

        $this->studentService->update($student, $data);
        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy(Student $student)
    {
        $this->studentService->delete($student);
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}

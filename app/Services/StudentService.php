<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{
    public function store(array $data): Student
    {
        return Student::create($data);
    }

    public function update(Student $student, array $data): Student
    {
        $student->update($data);
        return $student;
    }

    public function delete(Student $student)
    {
        return $student->delete();
    }

    public function getAll()
    {
        return Student::all();
    }

    public function getById($id): ?Student
    {
        return Student::find($id);
    }
}

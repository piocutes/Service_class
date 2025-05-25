<!DOCTYPE html>
<html>
<head><title>Student Details</title></head>
<body>
<h1>{{ $student->name }}</h1>
<p>Email: {{ $student->email }}</p>
<p>Course: {{ $student->course }}</p>
<a href="{{ route('students.edit', $student->id) }}">Edit</a>
<form action="{{ route('students.destroy', $student->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
<a href="{{ route('students.index') }}">Back to List</a>
</body>
</html>
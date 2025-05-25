<!DOCTYPE html>
<html>
<head><title>Edit Student</title></head>
<body>
<h1>Edit Student</h1>
<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')
    <p>Name: <input type="text" name="name" value="{{ $student->name }}" required></p>
    <p>Email: <input type="email" name="email" value="{{ $student->email }}" required></p>
    <p>Course: <input type="text" name="course" value="{{ $student->course }}" required></p>
    <button type="submit">Update</button>
</form>
<a href="{{ route('students.index') }}">Back to List</a>
</body>
</html>

<!DOCTYPE html>
<html>
<head><title>Create Student</title></head>
<body>
<h1>Add New Student</h1>
<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <p>Name: <input type="text" name="name" required></p>
    <p>Email: <input type="email" name="email" required></p>
    <p>Course: <input type="text" name="course" required></p>
    <button type="submit">Create</button>
</form>
<a href="{{ route('students.index') }}">Back to List</a>
</body>
</html>
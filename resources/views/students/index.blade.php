@extends('layouts.master')
@section('title', 'Students')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Students</h1>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    </div>
    <table class="table table-bordered mt-3">
        <tr><th>Name</th><th>Email</th><th>College</th><th>Actions</th></tr>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->college->name }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

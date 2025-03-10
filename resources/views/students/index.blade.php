@extends('layouts.master')
@section('title', 'Students')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>Students</h1>
        <!-- Button to add a new student -->
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    </div>

    <!-- Student filter by college-->
    <div class="mt-3">
        @include('students.filter', ['colleges' => $colleges])
    </div>

    <!-- Sorting options -->
    <div class="mt-3">
        @include('students.sort')
    </div>
      <!-- Alert message if no students are found -->
    @if($students->isEmpty())
        <div class="alert alert-info mt-3">
            No students found.
        </div>
    @else
        <table class="table table-bordered mt-3">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>College</th>
                <th>Actions</th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->college->name }}</td>
                    <td>
                        <!-- Button to view students details -->
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewStudentModal{{ $student->id }}">View</button>
                        <!-- Button to edit students details -->
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                         <!-- Button to delete students details -->
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="viewStudentModal{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="viewStudentModalLabel{{ $student->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewStudentModalLabel{{ $student->id }}">Student Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Name:</strong> {{ $student->name }}</p>
                                <p><strong>Email:</strong> {{ $student->email }}</p>
                                <p><strong>Phone:</strong> {{ $student->phone }}</p>
                                <p><strong>Date of Birth:</strong> {{ $student->dob }}</p>
                                <p><strong>College:</strong> {{ $student->college->name }}</p>
                                <p><strong>College Address:</strong> {{ $student->college->address }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
    @endif
@endsection

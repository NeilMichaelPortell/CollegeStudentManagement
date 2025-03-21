@extends('layouts.master')
@section('title', isset($student) ? 'Edit Student' : 'Add Student')
@section('content')
    <h1>{{ isset($student) ? 'Edit Student' : 'Add Student' }}</h1>
    <!-- Form to add or edit a student -->
    <form action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}" method="POST">
        @csrf
        @if(isset($student)) @method('PUT') @endif
        <!-- Input for student name -->
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $student->name ?? '') }}" required>
        </div>
        <!-- Input for student email -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $student->email ?? '') }}" required>
        </div>
        <!-- Input for student phone -->
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $student->phone ?? '') }}" required>
        </div>
        <!-- Input for student date of birth -->
        <div class="mb-3">
            <label class="form-label">Date of Birth</label>
            <input type="date" name="dob" class="form-control" value="{{ old('dob', $student->dob ?? '') }}" required>
        </div>
        <!-- Dropdown to select college -->
        <div class="mb-3">
            <label class="form-label">College</label>
            <select name="college_id" class="form-select" required>
                @foreach ($colleges as $college)
                    <option value="{{ $college->id }}" {{ (isset($student) && $student->college_id == $college->id) ? 'selected' : '' }}>{{ $college->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- Button to submit the form -->
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection

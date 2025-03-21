@extends('layouts.master')

@section('title', 'Add Student')

@section('content')
<div class="container mt-5">
    <h2>Add Student</h2>

   
            <!-- 6. Validation and Alerts -->
              <!-- Display validation errors -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    


      <!-- Form to add a new student -->
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <!-- Input for student name -->
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <!-- Input for student email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <!-- Input for student phone -->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
        </div>
        <!-- Input for student date of birth -->
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob') }}" required>
        </div>
        <!-- Dropdown to select college -->
        <div class="mb-3">
            <label for="college_id" class="form-label">College</label>
            <select class="form-select" id="college_id" name="college_id" required>
                <option value="">Select a College</option>
                @foreach($colleges as $college)
                    <option value="{{ $college->id }}">{{ $college->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- Buttons to submit the form or cancel -->
        <button type="submit" class="btn btn-success">Add Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

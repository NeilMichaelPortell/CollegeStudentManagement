@extends ('layouts.master')
@section('title', 'Edit Student')

@section('content')
<div class="container mt-5">
    <h2>Edit Student</h2>
    <!-- Form to edit a student -->
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Input for student name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
        </div>
        <!-- Input for student email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
        </div>
        <!-- Input for student phone -->
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $student->phone }}" required>
        </div>
        <!-- Input for student date of birth -->
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" class="form-control" value="{{ $student->dob }}" required>
        </div>
         <!-- Dropdown to select college -->
        <div class="form-group">
            <label for="college_id">College</label>
            <select name="college_id" class="form-control" required>
                @foreach($colleges as $college)
                    <option value="{{ $college->id }}" {{ $student->college_id == $college->id ? 'selected' : '' }}>
                        {{ $college->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <!-- Buttons to submit the form or cancel -->
        <button type="submit" class="btn btn-primary">Update Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Add College')

@section('content')
<div class="container mt-5">
    <h2>Add College</h2>


     <!-- 6. Validation and Alerts -->
    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form to create  a college -->
    <form action="{{ route('colleges.store') }}" method="POST">
        @csrf
            <!-- Input for college name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
            <!-- Input for college address -->
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
        </div>
            <!-- Buttons to submit the form or cancel -->
        <button type="submit" class="btn btn-primary">Add College</button>
        <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

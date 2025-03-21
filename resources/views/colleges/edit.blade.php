@extends ('layouts.master')
@section('title', 'Edit College')

@section('content')
<div class="container mt-5">
    <h2>Edit College</h2>

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

     <!-- Form to edit a college -->
    <form action="{{ route('colleges.update', $college->id) }}" method="POST">
        @csrf
        @method('PUT')

         <!-- Input for college name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $college->name }}" required>
        </div>
        <!-- Input for college address -->
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $college->address }}" required>
        </div>
        <!-- Buttons to submit the form or cancel -->
        <button type="submit" class="btn btn-primary">Update College</button>
        <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

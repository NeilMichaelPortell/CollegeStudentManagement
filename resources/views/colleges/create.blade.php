@extends('layouts.master')

@section('title', 'Add College')

@section('content')
<div class="container mt-5">
    <h2>Add College</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('colleges.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">College Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Add College</button>
        <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

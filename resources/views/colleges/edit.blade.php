@extends('layouts.app')

@section('title', 'Edit College')

@section('content')
<div class="container mt-5">
    <h1>Edit College</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('colleges.update', $college->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $college->name) }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $college->address) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update College</button>
        <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

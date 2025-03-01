@extends('layouts.master')
@section('title', 'Colleges')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Colleges</h1>
        <a href="{{ route('colleges.create') }}" class="btn btn-primary">Add College</a>
    </div>
    <table class="table table-bordered mt-3">
        <tr><th>Name</th><th>Address</th><th>Actions</th></tr>
        @foreach ($colleges as $college)
            <tr>
                <td>{{ $college->name }}</td>
                <td>{{ $college->address }}</td>
                <td>
                    <a href="{{ route('colleges.edit', $college->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('colleges.destroy', $college->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

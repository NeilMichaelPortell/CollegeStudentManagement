@extends('layouts.master')
@section('title', 'Colleges')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>Colleges</h1>
        <a href="{{ route('colleges.create') }}" class="btn btn-primary">Add College</a>
    </div>

    @if($colleges->isEmpty())
        <div class="alert alert-info mt-3">
            No colleges found.
        </div>
    @else
        <table class="table table-bordered mt-3">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            @foreach ($colleges as $college)
                <tr>
                    <td>{{ $college->name }}</td>
                    <td>{{ $college->address }}</td>
                    <td>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewCollegeModal{{ $college->id }}">View</button>
                        <a href="{{ route('colleges.edit', $college->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('colleges.destroy', $college->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="viewCollegeModal{{ $college->id }}" tabindex="-1" role="dialog" aria-labelledby="viewCollegeModalLabel{{ $college->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewCollegeModalLabel{{ $college->id }}">College Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Name:</strong> {{ $college->name }}</p>
                                <p><strong>Address:</strong> {{ $college->address }}</p>
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

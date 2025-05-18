@extends('base.app')
@section('title', 'lessons')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">lessons</h1>
                <a href="{{ route('lessons.create') }}" class="btn btn-success mb-3">Add lesson</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Course</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lessons as $lesson)
                            <tr>
                                <td>{{ $lesson->id }}</td>
                                <td>{{ $lesson->title }}</td>
                                <td>{{ $lesson->description }}</td>
                                <td>{{ $lesson->course->title }}</td>
                                {{-- <td>{{ $lesson->course_id }}</td> --}}
                                <td>
                                    <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

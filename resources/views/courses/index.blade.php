@extends('base.app');
@section('title', 'courses')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">courses</h1>
                <a href="{{ route('courses.create') }}" class="btn btn-styled mb-3">add new course</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->description }}</td>
                                <td>
                                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('courses.lessons', $course) }}" class="btn btn-info">Lessons</a>
                                    <a href="{{ route('courses.lessons.create', $course) }}" class="btn btn-primary">Add Lesson</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
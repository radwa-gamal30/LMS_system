@extends('base.app')
@section('title', 'lessons')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if (isset($course))
                <h2 class="text-center">Lessons for: {{ $course->title }}</h2>
                <a href="{{ route('courses.lessons.create', $course) }}" class="btn btn-styled  mb-3">+ Add new Lesson</a>
            @else
                <h2 class="text-center">All Lessons</h2>
            @endif
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lessons as $lesson)
                            <tr>
                                <td>{{ $lesson->title }}</td>
                                <td>{{ $lesson->content }}</td>
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
@endsection
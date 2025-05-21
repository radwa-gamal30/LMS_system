@extends('base.app')
@section('title', 'Enrollments')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if (isset($user))
                <h2 class="text-center">enrollments of: {{ $user->name }}</h2>
                <a href="{{ route('users.enrollments.create', $user) }}" class="btn btn-styled  mb-3">+ Add new Enrollment</a>
                @else
                <h2 class="text-center">All enrollments</h2>
            @endif
                {{-- <h1 class="text-center mt-5 text-secondary">Enrollments</h1> --}}
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Course Title</th>
                            <th>Enrollment Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $enrollment->course->title }}</td>
                                <td>{{ $enrollment->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline;">
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
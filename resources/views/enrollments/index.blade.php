@extends('base.app')
@section('title', 'Enrollments')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-5 text-secondary">Enrollments</h1>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Course Title</th>
                            <th>Enrollment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $enrollment->course->title }}</td>
                                <td>{{ $enrollment->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
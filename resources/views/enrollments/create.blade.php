@extends('base.app')
@section('title', 'Enrollments')
create new enrollment
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-secondary">Add New Enrollment</h1>
                <form action="{{ route('enrollments.store') }}" method="POST">
                    @csrf
                        <div class="form-group mb-3">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <label for="user_id">for</label>
                        <input type="text"  id="user_id" class="form-control bg-warning" value="{{ $user->name }}" readonly>    
                        @error('user_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="course_id">Course</label>
                        <select name="course_id" id="course_id" class="form-control" required>
                            <option value="">Select Course</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-styled mx-auto d-block">Create Enrollment</button>


                
                </form>
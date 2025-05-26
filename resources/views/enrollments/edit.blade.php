@extends('base.app')
@section('title', 'enrollment')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-secondary">Edit Enrollment</h1>
                <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <input type="hidden" name="user_id" value="{{ $enrollment->user_id }}">
                        <label for="user_id">student</label>
                        <input type="text" id="user_id" class="form-control bg-warning" value="{{ $enrollment->user->name }}" readonly>
                        @error('user_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="course_id">Course</label>
                        <select name="course_id" id="course_id" class="form-control" required>
                            <option value="">Select Course</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" {{ $enrollment->course_id == $course->id ? 'selected' : '' }}>{{ $course->title }}</option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                      {{-- paid --}}
                      <div class="form-group mb-3">
                        <label for="paid">Paid</label>
                        <input type="number" name="paid" id="paid" class="form-control" value="{{ $enrollment->paid }}">
                        @error('paid')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="remaining">Remaining</label>
                        <input type="number" name="remaining" id="remaining" class="form-control" value="{{ $enrollment->remaining }}" >
                        @error('paid')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-styled mx-auto d-block">update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
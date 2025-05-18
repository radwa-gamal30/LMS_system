@extends('base.app')
@section('title', 'courses')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-5 text-secondary">Add New Lesson</h1>
                <form action="{{ route('lessons.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">

                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <label for="course_title">Course</label>
                        <input type="text"  id="course_title" class="form-control bg-warning" value="{{ $course->title }}" readonly>    
                        @error('course_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                  
                    {{-- <div class="mb-3">
                        <label for="content" class="form-label">Course</label>
                        <select name="course_id" id="course_id" class="form-control" required>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach 
                        </select>
                        @error('course_id') 
                            <div class="alert alert-danger mt-2">{{ $message }}</div>   
                    @enderror
                    </div> --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Lesson Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                        @error('title')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>   
                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" class="form-control" rows="4"></textarea>
                        @error('content')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>   
                        
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-styled mx-auto d-block">Create Lesson</button>
                </form>
            </div>
        </div>
    </div>
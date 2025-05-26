@extends('base.app')
@section('title', 'lesson')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-5 text-secondary">Edit Lesson</h1>
                <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <input type="hidden" name="course_id" value="{{ $lesson->course_id }}">
                        <label for="course_title">Course</label>
                        <input type="text" id="course_title" class="form-control bg-warning" value="{{ $lesson->course->title }}" readonly>    
                        @error('course_id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Lesson Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $lesson->title }}" required>
                        @error('title')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>   
                             
                        @enderror   
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" class="form-control" rows="4">{{ $lesson->content }}</textarea>
                        @error('content')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>   
                             
                        @enderror   
                    </div>
                    <button type="submit" class="btn btn-styled mx-auto d-block">update</button>
                </form>
            </div> 
        </div>
    </div> 
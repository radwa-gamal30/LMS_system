
@extends('base.app')
@section('title', 'Edit Course')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mt-5 text-secondary">Edit A Course</h1>

            <form action="{{ route('courses.update',$course->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Course Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $course->title }}">
                    @error('title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>   
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control"  rows="4">{{$course->description}}</textarea>
                    @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>   
                @enderror

                </div>
                <button type="submit" class="btn btn-styled mx-auto d-block">update</button>
            </form>
        </div>
    </div>
</div>
   

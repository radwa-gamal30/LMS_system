@extends('base.app')
@section('title', 'courses')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-5 text-secondary">add new course</h1>
                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Course Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                        @error('title')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>   
                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                        @error('description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>   
                        
                    @enderror
                    </div>
                    {{-- duration --}}
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration (in hours)</label>
                        <input type="number" name="duration" id="duration" class="form-control" required>
                        @error('duration')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>   
                            
                        @enderror   
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">price</label>
                        <input type="number" name="price" id="price" class="form-control" required>
                        @error('price')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>   
                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">price</label>
                        <select name="level" id="level" class="form-control">
                            <option value="">Select Level</option>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        </select>
                        @error('level')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>   
                            
                        @enderror
                    </div>
                    
                    {{-- <div class="mb-3">
                        <label for="level" class="form-label">level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">Select Level</option>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        @error('title')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>   
                            
                        @enderror
                    </div> --}}

                    <button type="submit" class="btn btn-styled mx-auto d-block">create</button>
                </form>
            </div>
        </div>
    </div>
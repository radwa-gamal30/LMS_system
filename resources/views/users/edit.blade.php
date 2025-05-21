@extends('base.app')
@section('title', 'Edit User')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mt-5 text-secondary">Edit A Student</h1>

                <form action="{{ route('users.update', $user->id) }}" method="POST">

           
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Student Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>   
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                    @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>   
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
                    @error('phone')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>   
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}">
                    @error('address')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>   
                    @enderror

                </div>
                <button type="submit" class="btn btn-success">Update Student</button>
            </form>
        </div>
    </div>
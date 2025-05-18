@extends('base.app')
@section('title', 'users')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-5 text-secondary">Add New Student</h1>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">user Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"  name="email" id="email" class="form-control" rows="3" required>
                        @error('email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text"  name="phone" id="phone" class="form-control" rows="3" required>
                        @error('phone')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text"  name="address" id="address" class="form-control" rows="3">
                        @error('address')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"  name="password" id="password" class="form-control" rows="3" required>
                        @error('password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>       
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Password Confirm</label>
                        <input type="password"  name="password_confirmation" id="password_confirmation" class="form-control" rows="3" required>
                        @error('password_confirmation')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Create user</button>  
                </form>
            </div>
        </div>
    </div>
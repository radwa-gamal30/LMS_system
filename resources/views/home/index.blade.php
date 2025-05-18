@extends('base.app')

@section('title', 'Home')

@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-5" style="min-height: 80vh;">
        <div class="row w-100">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body text-center p-5">
                        <h1 class="mb-4">
                            Welcome 
                            @auth
                                {{ Auth::user()->name }}
                            @endauth 
                            to the Home Page
                        </h1>
                        <p class="lead text-muted">
                            You are successfully logged in. From here, you can explore your dashboard, manage lessons and enroll in courses.
                        </p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

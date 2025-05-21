@extends('base.app');
@section('title', 'Users')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-secondary">Students</h1>
                <a href="{{ route('users.create') }}" class="btn btn-styled mb-3">add new Student</a>
                <table class="table table-bordered table-striped">
                    <thead >
                        <tr class="text-center ">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                    {{-- new enrollment --}}
                                    <form action="{{ route('users.enrollments',['user'=>$user->id]) }}" method="GET" style="display:inline;">
                                        <button type="submit" class="btn btn-primary">enrollments</button>
                                    </form>
                                    <form action="{{ route('enrollments.create',['user'=>$user->id]) }}" method="GET" style="display:inline;">
                                        <button type="submit" class="btn btn-primary">new enrollment</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
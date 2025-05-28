@extends('base.app');
@section('title', 'courses')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">courses</h1>
                <a href="{{ route('courses.create') }}" class="btn btn-styled mb-3 btn-create">add new course</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->description }}</td>
                                <td>
                                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning btn-edit">Edit</a>
                                    <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline ;" class="delete-form">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                                    </form>
                                    <a href="{{ route('courses.lessons', $course) }}" class="btn btn-info">Lessons</a>
                                    <a href="{{ route('courses.lessons.create', $course) }}" class="btn btn-primary btn-lesson-create">Add Lesson</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                if (confirm('Are you sure you want to delete this course?')) {
                    this.submit();
                }
            });
        });
         document.addEventListener('DOMContentLoaded',function(e){
            e.preventDefault();

            // const userPermissions = @json(auth()->user()->permissions);
            const userPermissions = @json(auth()->user()->getPermissionNames());

            console.log("Per :", userPermissions);
            if(!userPermissions.includes('create_course')){
               document.querySelectorAll('.btn-create').forEach(btn => {btn.style.display ='none'} );
            }
            if(!userPermissions.includes('edit_course')){
               document.querySelectorAll('.btn-edit').forEach(btn => {btn.style.display ='none'} );
            }
            if(!userPermissions.includes('delete_course')){
               document.querySelectorAll('.delete-form').forEach(form => {form.style.display ='none'} );
               document.querySelectorAll('.btn-delete').forEach(btn => {btn.style.display ='none'} );
            }
            if(!userPermissions.includes('create_lesson')){
               document.querySelectorAll('.btn-lesson-create').forEach(btn => {btn.style.display ='none'} );
            }
        })
    </script>
    @endsection
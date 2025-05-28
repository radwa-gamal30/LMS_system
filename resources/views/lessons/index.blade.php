@extends('base.app')
@section('title', 'lessons')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if (isset($course))
                <h2 class="text-center">Lessons for: {{ $course->title }}</h2>
                <a href="{{ route('courses.lessons.create', $course) }}" class="btn btn-styled  mb-3 btn-create">+ Add new Lesson</a>
            @else
                <h2 class="text-center">All Lessons</h2>
            @endif
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lessons as $lesson)
                            <tr>
                                <td>{{ $lesson->title }}</td>
                                <td>{{ $lesson->content }}</td>
                                <td>
                                    <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-warning btn-edit">Edit</a>
                                    <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="delete-form" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                                    </form> 
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
                if (confirm('Are you sure you want to delete this lesson?')) {
                    this.submit();
                }
            });
        });
        document.addEventListener('DOMContentLoaded',function(e){
            e.preventDefault();
            // const userPermissions = @json(auth()->user()->permissions);
            const userPermissions = @json(auth()->user()->getPermissionNames());

            console.log("Per :", userPermissions);
            if(!userPermissions.includes('create_lesson')){
               document.querySelectorAll('.btn-create').forEach(btn => {btn.style.display ='none'} );
            }
            if(!userPermissions.includes('edit_lesson')){
                document.querySelectorAll('.btn-edit').forEach(btn => {btn.style.display ='none'} );
            }
            if(!userPermissions.includes('delete_lesson')){
                document.querySelectorAll('.delete-Form').forEach(form => {form.style.display ='none'} );
                document.querySelectorAll('.btn-delete').forEach(btn => {btn.style.display ='none'} );
            }
        })
    </script>
@endsection
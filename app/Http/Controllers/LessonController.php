<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:show_lesson')->only('index');
        $this->middleware('permission:create_lesson')->only('store', 'create');
        $this->middleware('permission:edit_lesson')->only('update', 'edit');
        $this->middleware('permission:delete_lesson')->only('destroy');

    }
    public function index()
    {
        $lessons = Lesson::all();
        return view('lessons.index', compact('lessons'));
    }
      
    public function customIndex(Course $course)
    {
        $lessons = $course->lessons()->with('course')->get();
        return view('lessons.index', compact('lessons','course'));
    }
    public function create(Course $course)
    {
        return view('lessons.create', compact('course'));
    }

    public function store(LessonRequest $request)
    {
        $data = $request->validated();
        Lesson::create($data);
        return redirect()->route('courses.index')->with('success', 'Lesson created successfully.');
    }

    public function show(Lesson $lesson)
    {
        return view('lessons.show', compact('lesson'));
    }
    public function edit(Lesson $lesson)
    {
        return view('lessons.edit', compact('lesson'));
    }
    public function update(LessonRequest $request, Lesson $lesson)
    {
        $data = $request->validated();
        $lesson->update($data);
        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully.');
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        $course = $lesson->course_id; // Assuming course_id is the foreign key in the Lesson model
        return redirect()->route('courses.lessons',['course'=>$course])->with('success', 'Lesson deleted successfully.');
    }
}

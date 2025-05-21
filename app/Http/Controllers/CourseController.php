<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:show_course')->only('index');
        $this->middleware('permission:create_course')->only('store', 'create');
        $this->middleware('permission:edit_course')->only('update', 'edit');
        $this->middleware('permission:delete_course')->only('destroy');

    }
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }
    
    public function create()
    {
        return view('courses.create');
    }
    
    public function store(CourseRequest $request)
    {
        $data=$request->validated();
    
        Course::create($data);
    
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }
    
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }
    
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }
    
    public function update(CourseRequest $request, Course $course)
    {
       $data= $request->validated();
    
        $course->update($data);
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }
    
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
    
}

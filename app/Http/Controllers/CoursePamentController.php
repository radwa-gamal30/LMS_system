<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Enrollment;
use App\Http\Requests\EnrollmentRequest;
class CoursePamentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function create(Request $request, $userId, $courseId)
    {
        $course = Course::findOrFail($courseId);
        $user = User::findOrFail($userId);
       return view('payment.create',compact('course', 'user')); 

    }
    public function store(EnrollmentRequest $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'method' => 'required|string|max:255', // e.g., 'credit_card', 'paypal', 'bank_transfer'
            'paid' => 'required|numeric|min:0',
            'remaining' => 'required|numeric|min:0',
            
        ]);
      
        Enrollment::create($data);
        return redirect()->route('users.enrollments', ['user' => $data['user_id']])
                         ->with('success', 'Payment processed and enrollment created successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentRequest;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $enrollments=Enrollment::with(['user','course'])->get();
        return view('enrollments.index',compact('enrollments'));
    }
    public function customIndex(User $user)
    {
        $enrollments = $user->enrollments()->with(['user','course'])->get();
        return view('enrollments.index', compact('user','enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        $courses=Course::all();

        return view('enrollments.create',compact('user','courses'));

    }

 
    public function store(EnrollmentRequest $request)
    {
        $data=$request->validated();
        Enrollment::create($data);
        return redirect()->route('users.index')->with('success', 'Enrollment created successfully.');
    }

    public function show(Enrollment $enrollment)
    {
        $enrollment->load(['user','course']);
        return view('users.show', compact('enrollment'));
    }

  
    public function edit(Enrollment $enrollment)
    {
        $users=User::all();
        $courses=Course::all();
        return view('enrollments.edit',compact('enrollment','users','courses'));
    }


    public function update(EnrollmentRequest $request, Enrollment $enrollment)
    {
        $data=$request->validated();
        $enrollment->update($data);
        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
    }

  
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
    }
    private function suggestPaymentMethod($user, $course)
{
    $income = $user->balance ?? 0;
    $price = $course->price ?? 0;

    if ($price > ($income * 0.5)) {
        return 'Installments';
    } elseif ($price > ($income * 0.3)) {
        return 'Credit Card';
    } else {
        return 'Wallet or Debit Card';
    }
}
}

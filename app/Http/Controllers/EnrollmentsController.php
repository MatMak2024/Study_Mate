<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnrollmentsController extends Controller
{
    public function index() {
        $enrollments = Enrollment::all();
        return view('pages.enrollment.index', compact('enrollments'));
    }

    public function create() {
        $courses = Course::all();
        $students = Student::all();
        return view('pages.enrollment.create', compact('courses','students'));
    }


    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'student_id' => ['required', 'numeric'],
            'course_id' => ['required', 'numeric']
        ])->validate();

        //enregistrement
        $enrollment = new Enrollment();
        $enrollment->student_id = $request->student_id;
        $enrollment->course_id = $request->course_id;
        $enrollment->save();

        return redirect()->route('courses.index')->with('success','student ajouté avec success');
    }


    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}

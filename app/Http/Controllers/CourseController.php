<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'role:teacher'])->only('create','store','edit');
    }
    public function index() {
        $courses = Course::all();
        return view('pages.course.index', compact('courses'));
    }

    public function create() {

        $students = Student::all();
        return view('pages.course.create', compact('students'));
    }

    public function store(Request $request) {

        //validation
        Validator::make($request->all(), [
            'name' => ['required', 'string','max:50'],
            'description' => ['required', 'string', 'max:1000'],
            'image' => ['required', 'file']
        ])->validate();

        if($request->hasFile('image')) {
            //suvegarder l'image
            $path = $request->image->storePublicly('course/covers', ['disk' => 'public']);
        }else {
            $path = '';
        }

        //ernregistrement
        $course = new Course();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->image = $path;
        $course->save();

        return redirect()->route('courses.index')->with('succes', 'course ajouté avec success');

    }


    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Course $course)
    {
        $teachers = Teacher::all();
        $courses = Course::all();
        return view('pages.course.edit', compact('courses', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string','max:50'],
            'description' => ['required', 'string', 'max:1000'],
            'image' => ['required', 'file']
        ])->validate();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)    {

        if($course && $course->id != null) {
            $course->delete();
        }

        return redirect()->route('courses.index')->with('success', 'Student supprimée avec success');
    }
}

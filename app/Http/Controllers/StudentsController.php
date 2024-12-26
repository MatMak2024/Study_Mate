<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    public function __construct()  {
        $this->middleware(['auth', 'role:teacher'])->only('index');
        $this->middleware(['auth', 'role:student'])->except('index');
    }


    public function index() {
        $students = Student::all();
        return view('pages.student.index', compact('students'));
    }


    //vas nous retourner le formulaire
    public function create() {
        $students = Student::all();
        $courses = Course::all();
        return view('pages.student.create', compact('courses','students'));
    }


    //vas enregistrer les données
    public function store(Request $request) {
        //validation

        Validator::make($request->all(), [
            'name' => ['required', 'string','max:50'],
            'firstname' => ['required', 'string','max:50'],
            'email' => ['required', 'string', 'max:250', 'unique:students,email'],
            'phone' => ['required', 'max:15'],
            'birth_date' => ['required', 'date'],

        ])->validate();

        //enregistrement

        $student = new Student();
        $student->name = $request->name;
        $student->firstname = $request->firstname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->birth_date = $request->birth_date;
        $student->course_id = $request->course_id;
        $student->save();

        return redirect()->route('students.index')->with('success','student ajouté avec success');

    }


    public function show(Student $student)
    {

    }

    public function edit(Request $request, Student $student) {
        $courses = Course::all();
        return view('pages.student.edit', compact('courses', 'student'));
    }


    public function update(Request $request, Student $student) {
        Validator::make($request->all(), [
            'name' => ['required', 'string','max:50'],
            'firstname' => ['required', 'string','max:50'],
            'email' => ['required', 'string', 'max:250', 'unique:students,email,'.$student->id],
            'phone' => ['required', 'max:15'],
            'birth_date' => ['required', 'date'],

        ])->validate();

        $student->update($request->except('_token', '_method'));
        return redirect()->route('students.index')->with('success','student modifié avec success');
    }

    public function destroy(Student $student) {
        if($student && $student->id != null) {
            $student->delete();
        }

        return redirect()->route('students.index')->with('success', 'Student supprimée avec success');
    }
}

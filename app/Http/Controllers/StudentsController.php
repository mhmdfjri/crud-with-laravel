<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('index',['students'=>$students]);
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){
        // dd($request->all());
        Student::create($request->all());

        return redirect()->route('students.index')->with('success-create','Student Added successfully');
    }

    
    public function edit(Student $student){
        return view('edit',['student'=>$student]);
    }

    public function update(Request $request, Student $student){
        $student->name = $request->name;
        $student->npm = $request->npm;
        $student->address = $request->address;
        $student->update();

        return redirect()->route('students.index')->with('success-update', 'Data Updated');
    }

    public function destroy(Student $student){
        $student->delete();
        return redirect()->route('students.index')->with('success-delete','Data Deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function index()
       {
           return view('index');
       }
    public function view()
    {
      $student = Student::All();
        return view('view')->with('student',$student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){

      $Student = new Student;

      $Student ->Name = $request->Name;
      $Student ->Department = $request->Department;
      $Student ->Age = $request->Age;
      $Student ->Address = $request->Address;

      $Student->save();
      return redirect()->route('view');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($student)
    {
        $student = Student::find($student);
        return view('edit')->with('student',$student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student)
    {
        $student = Student::find($student);
        $student->Name = $request->Name;
        $student->Department = $request->Department;
        $student->Age = $request->Age;
        $student->Address = $request->Address;

        $student->save();
        return redirect()->Route('view');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->Route('view');
    }
}

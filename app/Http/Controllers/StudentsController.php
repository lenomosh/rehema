<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Validator;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = App\Classes::all();
        $students = App\Students::with('class')->get();
        return view('students.index')->with([
            'classes' => $classes,
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = App\Classes::all();
        return view('students.index')->with('classes', $classes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'first_name' => 'required|min:2|max:15',
            'last_name' => 'required|min:2|max:15',
            'gender' => 'required',
            'class_id' => 'required'
        ]);
        $first_name = strtolower($request->first_name);
        $first_name = ucfirst($first_name);
        $last_name = strtolower($request->last_name);
        $last_name = ucfirst($last_name);
        $gender = $request->gender;
        $class_id = $request->class_id;
        $student = new App\Students;
        $student->first_name = $first_name;
        $student->last_name = $last_name;
        $student->gender = $gender;
        $student->class_id = $class_id;
        $student->save();
        return redirect()->back()->with('message', 'Student successfully added to the database');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = App\Students::with('class');
        $student = $student->find($id);
        $classes = App\Classes::all();
        return view('students.show')->with([
            'classes' => $classes,
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = App\Students::with('class');
        $student = $student->find($id);
        $classes = App\Classes::all();
        return view('students.edit')->with([
            'classes' => $classes,
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = App\Students::find($id);
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $gender = $request->gender;
        $class_id = $request->class_id;
        $student->first_name = $first_name;
        $student->last_name = $last_name;
        $student->gender = $gender;
        $student->class_id = $class_id;
        $student->update();
        return redirect()->route('students.index')->with('message', "$first_name's details were edited successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = App\Students::find($id);
        $student->delete();
        $response = 'Student has been deleted successfully';
        return redirect()->route('students.index')->with('response', $response);
    }
}

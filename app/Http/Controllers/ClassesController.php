<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = App\Classes::with('class_teacher', 'students')->get();
        $no_class_teacher = App\ClassTeachers::with('class_assigned')->doesntHave('class_assigned')->get();
        return view('classes.index')->with(array(
            'classes' => $classes,
            'teachers' => $no_class_teacher,
        ));

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'class_id' => 'required',
            'class_name' => 'min:4|required',
            'class_teacher' => 'required'
        ]);
        $class_id = strtoupper($request->class_id);
        $class_name = strtoupper($request->class_name);
        $teacher_id = strtoupper($request->class_teacher);
        $new_class = new App\Classes;
        $new_class->class_id = $class_id;
        $new_class->class_name = $class_name;
        $new_class->teacher_id = $teacher_id;
        $new_class->save();
        return redirect()->back()->with('message', 'Class has been updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = App\Classes::with('class_teacher');
        $class = $class->find($id);
        return view('classes.edit')->with('class', $class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = App\Classes::with('class_teacher');
        $class = $class->find($id);
        return view('classes.edit')->with(['class', $class]);

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
        $class = App\Classes::find($id);
        $class_id = strtoupper($request->class_id);
        $class_name = strtoupper($request->class_name);
        $class->class_id = $class_id;
        $class->class_name = $class_name;
        $class->save();
        return redirect()->route('classes.index')->with('message', 'Class has been updated successfully');


        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = App\Classes::find($id);
        $class->delete();
        $response = 'Class has been deleted successfully';
        return redirect()->route('classes.index')->with('response', $response);

    }
}

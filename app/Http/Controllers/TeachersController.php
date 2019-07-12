<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = App\ClassTeachers::with('class_assigned.students')->get();
        return $this->create();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = App\Classes::with(['class_teacher', 'students'])->get();
        $no_class_teacher = App\Classes::where('teacher_id', '=', null)->get();
        return view('new_teacher')->with(array(
            'classes' => $classes,
            'noclassteacher' => $no_class_teacher,
        ));

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
            'first_name' => 'required|max:10',
            'last_name' => 'required|max:10',
            'email' => 'email|required|max:60',
            'password' => 'regex:^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^'
        ]);
        $first_name = $request->first_name;
        $first_name = strtolower($first_name);
        $first_name = ucfirst($first_name);
        $last_name = $request->last_name;
        $last_name = strtolower($last_name);
        $last_name = ucfirst($last_name);

        $new_teacher = new App\ClassTeachers;
        $new_teacher->first_name = $first_name;
        $new_teacher->last_name = $last_name;
        $new_teacher->email = strtolower($request->email);
        $new_teacher->password = Hash::make($request->password);
        $new_teacher->save();

        $class_id = $request->class_assigned;
        $teacher_id = $new_teacher->teacher_id;
        $class_teacher = App\Classes::find($class_id);
        $class_teacher->teacher_id = $teacher_id;
        $class_teacher->save();
        return redirect()->back()->with('message', 'Teacher added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}

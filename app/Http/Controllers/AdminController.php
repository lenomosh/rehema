<?php

namespace App\Http\Controllers;

use App;

class AdminController extends Controller
{
    public function index()
    {
        $approved = App\Candidates::all()->count();
        $failed = App\FailedCandidates::all()->count();
        $students = App\Students::all()->count();
        $teachers = App\ClassTeachers::all()->count();
        $info = array(
            'approved' => $approved,
            'rejected' => $failed,
            'students' => $students,
            'teachers' => $teachers,
        );
        $info = json_encode($info);
        $info = json_decode($info);
        return view('dashboard')->with('info', $info);

    }
    //
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassTeachers extends Model
{
    protected $table = 'class_teachers';
    protected $primaryKey = 'teacher_id';
    protected $timestamp = false;

    public function class_assigned()
    {
        return $this->belongsTo('App\Classes', 'teacher_id', 'teacher_id');
    }
    //
}

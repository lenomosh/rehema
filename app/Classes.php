<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public $incrementing = false;
    protected $table = 'classes';
    protected $primaryKey = 'class_id';

    public function class_teacher()
    {
        return $this->hasOne('App\ClassTeachers', 'teacher_id', 'teacher_id');
    }

    public function students()
    {
        return $this->hasMany('App\Students', 'class_id', 'class_id');
    }

    public function form()
    {
        return $this->belongsTo('App\Forms', 'form_id', 'form_id');
    }

    public function spoilt_votes()
    {
        return $this->hasMany('App\SpoiltVotes', 'class_id', 'class_id');
    }

}

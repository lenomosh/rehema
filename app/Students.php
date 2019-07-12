<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'admin_number';
    protected $fillable = ['first_name', 'last_name', 'gender', 'class_id'];

    public function class()
    {
        return $this->belongsTo('App\Classes', 'class_id', 'class_id');
    }

    public function candidate()
    {
        return $this->hasMany('App\Candidates', 'admin_number', 'admin_number');
    }

    public function seconder()
    {
        return $this->hasMany('App\Seconders', 'admin_number', 'admin_number');
    }

    public function proposer()
    {
        return $this->hasMany('App\Proposers', 'admin_number', 'admin_number');
    }

    public function failed_candidates()
    {
        return $this->hasMany('App\FailedCandidates', 'admin_number', 'admin_number');
    }
    //
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    protected $table = 'forms';
    protected $primaryKey = 'form_id';

    public function class()
    {
        return $this->hasMany('App\Classes', 'form_id', 'form_id');
    }
}

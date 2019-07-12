<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
    protected $table = 'admin_levels';
    protected $primaryKey = 'level_id';

    public function positions()
    {
        return $this->hasMany('App\Positions', 'level_id', 'level_id');
    }
}

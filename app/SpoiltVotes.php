<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpoiltVotes extends Model
{
    //
    public function class()
    {
        return $this->belongsTo('App\Classes', 'class_id', 'class_id');
    }

    public function position()
    {
        return $this->belongsTo('App\Positions', 'position_id', 'position_id');
    }
}

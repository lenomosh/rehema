<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    protected $table = 'admin_positions';
    protected $primaryKey = 'position_id';

    public function level()
    {
        return $this->belongsTo('App\Levels', 'level_id', 'level_id');
    }

    public function candidates()
    {
        return $this->hasMany('App\Candidates', 'position_id', 'position_id');
    }

    public function SpoiltVotes()
    {
        return $this->hasMany('App\SpoiltVotes', 'position_id', 'position_id');
    }

}

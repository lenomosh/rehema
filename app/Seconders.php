<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seconders extends Model
{
    //

    protected $table = 'seconders';
    protected $primaryKey = 'seconder_id';

    public function candidate()
    {
        return $this->belongsTo('App\Candidates', 'candidate_id', 'candidate_id');
    }

    public function details()
    {
        return $this->belongsTo('App\Students', 'admin_number', 'admin_number');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FailedCandidates extends Model
{
    protected $table = 'failed_candidates';

    public function details()
    {
        return $this->belongsTo('App\Students', 'admin_number', 'admin_number');
    }

    public function position_details()
    {
        return $this->belongsTo('App\Positions', 'position_id', 'position_id');
    }

}

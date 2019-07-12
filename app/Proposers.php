<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposers extends Model
{
    protected $table = 'proposers';
    protected $primaryKey = 'proposer_id';

    public function details()
    {
        return $this->belongsTo('App\Students', 'admin_number', 'admin_number');
    }

    public function candidate()
    {
        return $this->belongsTo('App\Candidates', 'candidate_id', 'candidate_id');
    }
}

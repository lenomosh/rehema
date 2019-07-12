<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
    protected $table = 'candidates';
    protected $primaryKey = 'candidate_id';

    public function level_candidates($position_id)
    {
        $details = $this::with('info', 'position')->get();
        $candidates = array();
        foreach ($details as $detail) {
            if ($detail->position_id == $position_id) {
                array_push($candidates, $detail);
            }
        }
        return $candidates;
    }

    public function candidate_info()
    {
        $candidate_info = $this::with('info.class.form', 'seconders.details', 'proposers.details', 'position.level')->get();
        return $candidate_info;


    }

    public function seconders()
    {
        return $this->hasMany('App\Seconders', 'candidate_id', 'candidate_id');
    }

    public function proposers()
    {
        return $this->hasOne('App\Proposers', 'candidate_id', 'candidate_id');
    }

    public function info()
    {
        return $this->belongsTo('App\Students', 'admin_number', 'admin_number');
    }

    public function position()
    {
        return $this->belongsTo('App\Positions', 'position_id', 'position_id');
    }

    public function vet($admin_number, $position_id)
    {

        $student_details = $this->student_details($admin_number);
        $position_details = Positions::with('level')->find($position_id);
        $level_id = $position_details->level_id;
        $class = $student_details->class_id;
        $gender = $student_details->gender;
        //
        //verification for school level
        $school_level_eligibility = ['3C' => 'THREE CENTRAL', '3N' => 'THREE NORTH', '3E' => 'THREE EAST', '3S' => 'THREE SOUTH', '3W' => 'THREE WEST'];
        if ($level_id == 1000 && !array_key_exists($class, $school_level_eligibility)) {
            return ['response' => 0];//The candidate can't vie for School level seat
        }
        if ($gender == 'M' && $position_details->position_name == 'Head Girl') {
            return ['response' => 1];//Applying for a seat of opposite gender
        } elseif ($gender == 'F' && $position_details->position_name == 'Head Boy') {
            return ['response' => 1];//Applying for a seat of opposite gender

        } else return ['response' => 2];

    }

    public static function student_details($admin_number)
    {
        $student = Students::find($admin_number);
        if (is_null($student)) {
            return ['response' => 5];
        } else  $student = Students::with('candidate', 'seconder', 'proposer', 'failed_candidates')->find($admin_number);
        return $student;
    }

    public function check_existence($id)
    {
        $search = $this->student_details($id);
        if (isset($search['response'])) {
            return $search;
        }
        if (!$search->candidate->isEmpty()
            || !$search->seconder->isEmpty()
            || !$search->proposer->isEmpty()
            || !$search->failed_candidates->isEmpty()) {
            return ['response' => 3];
        } else return ['response' => 2];
    }

    public function count()
    {
        $candidates = $this::all();
        return $candidates->count();
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveVoting extends Model
{
  protected $table = 'candidates';
  protected $primaryKey = 'candidate_id';
  protected $hidden = ['created_at','updated_at','position_id','admin_number'];
}

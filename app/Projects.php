<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public function processes(){
    	
    	// return $this->belongs_to('pjId');
    	return $this->hasMany('App\Processes');
    }
}

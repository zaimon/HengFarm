<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processes extends Model
{
    public function projects(){
        return $this->belongsTo('App\Projects');
    }
}

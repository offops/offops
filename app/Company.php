<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function workspace()
    {
    	return $this->belongsTo('Company');
    }

    public function users()
    {
    	return $this->hasMany('User');
    }
}

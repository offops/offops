<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	/**
	 * This company belongs to a workspace
	 * @return Relation
	 */
    public function workspace()
    {
    	return $this->belongsTo('App\Workspace');
    }

    /**
     * This company has many users
     * @return Relation
     */
    public function users()
    {
    	return $this->hasMany('App\User');
    }
}

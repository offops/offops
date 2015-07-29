<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name'
    ];

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

    /**
     * This company has many contracts
     * @return Relation
     */
    public function contracts()
    {
        return $this->hasMany('App\Company');
    }
}

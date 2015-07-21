<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
	/**
	 * This workspace has many companies
	 * @return Relation
	 */
	public function companies()
	{
		return $this->hasMany('App\Company');
	}
}

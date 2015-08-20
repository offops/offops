<?php

namespace App;

use \Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	/**
	 * This contract belongs to a company
	 * @return Relation
	 */
    public function company()
    {
    	return $this->belongsTo('App\Company');
    }
}

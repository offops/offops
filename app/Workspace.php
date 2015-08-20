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

	public function textblock($key = '')
	{
		return $this->textblocks()->where('key', $key)->pluck('text');
	}

	public function textblocks()
	{
		return $this->hasMany('App\Textblock');
	}
}

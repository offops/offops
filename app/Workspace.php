<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
	public function companies()
	{
		return $this->hasMany('Workspace');
	}
}

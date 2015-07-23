<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
	public function newBaseQueryBuilder()
	{
		return parent::newBaseQueryBuilder()
			->where('type', 'admin');
	}
}
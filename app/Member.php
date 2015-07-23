<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends User
{
    public function newBaseQueryBuilder()
    {
    	return parent::newBaseQueryBuilder()
		->where('type', 'member');
    }
}

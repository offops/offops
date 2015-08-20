<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Textblock extends Model
{
	/**
	 * Mass-assignable attributes
	 * @var  array
	 */
	protected $fillable = [
		'key',
		'text',
		'workspace_id'
	];

	/**
	 * Toggle whether timestamps are used
	 * @var boolean
	 */
	public $timestamps = false;
}

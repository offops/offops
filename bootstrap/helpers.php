<?php 

if (!function_exists('workspace'))
{
	function workspace($key, $id = 1)
	{
		$workspace = \App\Workspace::find($id);
		return $workspace ? $workspace->$key : '';
	}
}

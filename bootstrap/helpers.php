<?php 

if (!function_exists('workspace'))
{
	function workspace($key = null, $id = 1)
	{
		$workspace = \App\Workspace::find($id);
		return ($workspace && $key) ? $workspace->$key : $workspace;
	}
}

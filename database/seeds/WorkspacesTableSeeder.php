<?php

use Illuminate\Database\Seeder;

class WorkspacesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$workspaces = array(
			array(
				'key' => 'district',
				'name' => 'District CoWork'
			),
		);

		foreach ($workspaces as $workspace)
		{
			\App\Workspace::create($workspace);
		}
	}
}

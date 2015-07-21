<?php

use Illuminate\Database\Seeder;


class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker\Factory::create();

		$workspace_id = App\Workspace::pluck('id');

		foreach (range(1,20) as $company)
		{
			App\Company::create(array(
				'name' => $faker->company,
				'workspace_id' => $workspace_id
			));
		}
    }
}

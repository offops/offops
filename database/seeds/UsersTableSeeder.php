<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();
    	$companies = App\Company::get();
    	$password = Hash::make('secret');

    	foreach (range(1,50) as $i)
    	{
    		$first_name = $faker->firstName;
    		$last_name = $faker->lastName;
    		$name = "{$first_name} {$last_name}";
    		$email = strtolower("{$first_name}.{$last_name}@email.com");

    		$user = (new App\User)->fill([
    			'name' => $name,
    			'email' => $email,
    		]);
    		$user->password = $password;
    		$user->company_id = $companies->random()->id;
    		$user->save();
    	}
    }
}

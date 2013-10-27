<?php

require base_path().'/vendor/fzaninotto/faker/src/autoload.php';

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('ProjectTableSeeder');
		$this->call('TaskTableSeeder');
	}

}

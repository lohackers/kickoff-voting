<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ProjectTableSeeder');
	}

}

class ProjectTableSeeder extends Seeder {
	public function run()
	{
		Project::create(array(
			'name' => 'Tokame'
		));
		Project::create(array(
			'name' => 'Recycool'
		));
		Project::create(array(
			'name' => 'Namaste'
		));
	}
}
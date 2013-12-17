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
			'name' => 'Progetto numero 1'
		));
		Project::create(array(
			'name' => 'Progetto numero 2'
		));
		Project::create(array(
			'name' => 'Progetto numero 3'
		));
	}
}
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

		$this->call('UserTableSeeder');
		$this->call('ProjectTableSeeder');
	}

}

class UserTableSeeder extends Seeder {
	public function run()
	{
		User::create(array(
			'email' => 'mrosati@h-art.com'
		));
		User::create(array(
			'email' => 'gnegro@h-art.com'
		));
		User::create(array(
			'email' => 'mfiaschini@h-art.com'
		));
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
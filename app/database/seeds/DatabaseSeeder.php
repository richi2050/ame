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
        $this->call('ProductTableSeeder');
        $this->call('ConfigTableSeeder');
        $this->call('NationalitieTableSeeder');
        $this->call('JobTableSeeder');
	}

}

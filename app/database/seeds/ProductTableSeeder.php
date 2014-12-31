<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        Product::create([
            'name'         => 'Hospital Cash',
            'description'  => $faker->text()
        ]);

        Product::create([
            'name'         => 'Gastos funerarios',
            'description'  => $faker->text()
        ]);

		/*foreach(range(1, 10) as $index)
		{
			Product::create([
            'name'         => $faker->company(),
            'description'  => $faker->text()
			]);
		}*/
	}

}
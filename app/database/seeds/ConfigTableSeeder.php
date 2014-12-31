<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ConfigTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        Configuration::create([
            'label'         => 'Ip',
            'value'         => '187.177.59.218'
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
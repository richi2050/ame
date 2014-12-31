<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        User::create([
            'name' => 'admin',
            'user' => 'admin',
            'password' => \Hash::make('1234'),
            'first_name' => 'admin',
            'email' => 'admin@richisystem.com',
            'id_rol'=> '1'

        ]);

        User::create([
            'name' => 'prueba',
            'user' => 'prueba',
            'password' => \Hash::make('1234'),
            'first_name' => 'admin',
            'email' => 'admin@richisystem.com',
            'id_rol'=> '2'

        ]);


        foreach (range(1, 100) as $index) {
            User::create([
                'name' => $faker->name,
                'user' => $faker->userName,
                'id_rol' => $faker->randomElement([1,2]),
                'password' => \Hash::make('1234'),
                'first_name' =>$faker->firstName,
                'email' => $faker->email


            ]);
        }
    }

}
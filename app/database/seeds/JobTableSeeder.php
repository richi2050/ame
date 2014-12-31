<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class JobTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        Job::create(['id' => "15", 'name' => 'CINEMATROGRAFIA Y ESPARCIMIENTO']);
        Job::create(['id' => "16", 'name' => 'COMERCIO']);
        Job::create(['id' => "14", 'name' => 'COMUNICACIONES']);
        Job::create(['id' => "11", 'name' => 'CONSTRUCCIÓN']);
        Job::create(['id' => "6", 'name' => 'ENERGÍA ELECTRICA']);
        Job::create(['id' => "20", 'name' => 'ESTUDIANTE']);
        Job::create(['id' => "10", 'name' => 'FAB. MAQUINARIA Y ARTÍCULOS ELÉCTRICOS']);
        Job::create(['id' => "2", 'name' => 'GANADERÍA']);
        Job::create(['id' => "18", 'name' => 'GOBIERNO ESTATAL Y MUNICIPAL']);
        Job::create(['id' => "17", 'name' => 'GOBIERNO FEDERAL']);
        Job::create(['id' => "21", 'name' => 'HOGAR']);
        Job::create(['id' => "7", 'name' => 'INDUSTRIA MANUFACTURERA']);
        Job::create(['id' => "8", 'name' => 'INDUSTRIA PRO. MINEROS NO METÁLICOS']);
        Job::create(['id' => "25", 'name' => 'INSTITUCIONES ANÁLOGAS']);
        Job::create(['id' => "3", 'name' => 'MINERÍA']);
        Job::create(['id' => "26", 'name' => 'OTRAS ACTIVIDADES']);
        Job::create(['id' => "5", 'name' => 'PETRÓLEO']);
        Job::create(['id' => "12", 'name' => 'SERVICIOS']);
        Job::create(['id' => "19", 'name' => 'SERVICIOS BANCARIOS - FINANCIEROS ']);
        Job::create(['id' => "24", 'name' => 'SERVICIOS MÉDICOS']);
        Job::create(['id' => "23", 'name' => 'SERVICIOS PROFESIONALES Y TÉCNICOS']);
        Job::create(['id' => "4", 'name' => 'SIDERURGÍA PRO. METÁLICOS ARTEFACTOS']);
        Job::create(['id' => "9", 'name' => 'SIDERURGÍA PRO. METÁLICOS ARTEFACTOS']);
        Job::create(['id' => "13", 'name' => 'TRANSPORTES']);
        Job::create(['id' => "22", 'name' => 'TURISMO HOTELERÍA Y RESTAURANTES']);


    }

}
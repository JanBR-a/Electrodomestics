<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElectrodomesticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('electrodomestics')->insert([
            'tipus' => 'Electrodomestics',
            'marca' => 'Electrodomestics',
            'preu' => 1000,
            'descripcio' => 'Electrodomestics descripcio',
            'model' => 'Electrodomestics',
            'stock' => 10
        ]);

        DB::table('electrodomestics')->insert([
            'tipus' => 'Electrodomestics',
            'marca' => 'Electrodomestics',
            'preu' => 1002,
            'descripcio' => 'Electrodomestics descripcio',
            'model' => 'Electrodomestics',
            'stock' => 10
        ]);
        DB::table('electrodomestics')->insert([
            'tipus' => 'Electrodomestics',
            'marca' => 'Electrodomestics',
            'preu' => 1003,
            'descripcio' => 'Electrodomestics descripcio',
            'model' => 'Electrodomestics',
            'stock' => 10
        ]);

    }
}

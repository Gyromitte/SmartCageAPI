<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SensorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sensorTypes = [
            ['name' => 'Agua', 'unit' => '%'],
            ['name' => 'Gas', 'unit' => 'ppm'],
            ['name' => 'Comida', 'unit' => 'kg'],
            ['name' => 'Temperatura', 'unit' => '°C'],
            ['name' => 'Proximidad', 'unit' => ''],
            ['name' => 'Ruido', 'unit' => ''],
        ];
        DB::table('sensor_types')->insert($sensorTypes);
    }
}

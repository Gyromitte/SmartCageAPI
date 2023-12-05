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
            ['name' => 'waterLevel', 'unit' => '%'],
            ['name' => 'gas', 'unit' => 'ppm'],
            ['name' => 'weightFood', 'unit' => 'kg'],
            ['name' => 'thermisor', 'unit' => '°C'],
            ['name' => 'infrared', 'unit' => ''],
            ['name' => 'sound', 'unit' => ''],
        ];
        DB::table('sensor_types')->insert($sensorTypes);
    }
}

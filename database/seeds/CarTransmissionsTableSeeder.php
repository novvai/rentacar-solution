<?php

use App\Models\CarTransmission;
use Illuminate\Database\Seeder;

class CarTransmissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarTransmission::create(['title' => 'Ръчна']);
        CarTransmission::create(['title' => 'Автоматична']);
        CarTransmission::create(['title' => 'Полуавтоматична']);
    }
}

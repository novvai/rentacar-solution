<?php

use App\Models\Price;
use Illuminate\Database\Seeder;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::create(['title' => '1 - 3 days', 'days' => 3, 'price' => '20']);
        Price::create(['title' => '4 - 7 days', 'days' => 7, 'price' => '18']);
        Price::create(['title' => '7+ days', 'days' => null, 'price' => '16']);
    }
}

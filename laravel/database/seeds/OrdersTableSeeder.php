<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Order::class,10)->create();

    }
}
//Здесь нужно ещё связать с продуктами
//как-то так: each(function ($order){
//            $order->products()->attach(\App\Models\Product::get()->random());
//но как правильно записать не знаю!

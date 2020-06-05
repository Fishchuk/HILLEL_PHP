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
        factory(\App\Models\Order::class,10)->create()->each(function (\App\Models\Order $order){
            $countOfProduct = rand(1,3);
            for($i=0; $i< $countOfProduct;$i++){
                $quantity = rand(1,10);
                $product = \App\Models\Product::all()->random();
                $product->orders()->updateExistingPivot($order, [
                    'quantity' => $quantity,
                    'price'  => $product->price
                ]);
            }
        });

    }
}


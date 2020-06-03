<?php

use Illuminate\Database\Seeder;

class OrdersStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderStatuses = config('order_status');
        if (!empty($orderStatuses)){
            foreach ($orderStatuses as $orderStatus){
                $createStatus[] =['type' =>$orderStatus];
            }
            DB::table('order_statuses')->insert($createStatus);
        }
    }
}

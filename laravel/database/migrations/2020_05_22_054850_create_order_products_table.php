<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('quantity');
            $table->float('price');
            $table->foreign(['order_id'])
                ->references('id')
                ->on('orders');

            $table->foreign(['product_id'])
                ->references('id')
                ->on('products')
                ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders_products', function (Blueprint $table){
            if (Schema::hasColumn('orders_products','product_id')){
                $table->dropForeign(['product_id']);
            }
            if (Schema::hasColumn('orders_products','order_id')) {
                $table->dropForeign(['order_id']);
            }
        });

        Schema::dropIfExists('orders_products');
    }
}

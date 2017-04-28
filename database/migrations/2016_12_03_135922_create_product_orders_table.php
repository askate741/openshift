<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*產品訂單表*/
        Schema::create('product_orders', function (Blueprint $table) {
            $table->increments('no');/*訂單編號*/
            $table->integer('member_no')->nullable();/*會員編號*/
            $table->foreign('member_no')->references('no')->on('members');
            $table->integer('product_no');/*產品編號*/
            $table->foreign('product_no')->references('no')->on('products');
            $table->integer('quantity');/*數量*/
            $table->date('order_date');/*訂單日期*/
            $table->integer('actual_price');/*實際售價*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_orders');
    }
}

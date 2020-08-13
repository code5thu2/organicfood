<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('payment_id');
            $table->unsignedInteger('shipping_id');
            $table->string('payment');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->string('shipping');
            $table->text('note')->nullable();
            $table->float('total', 20, 2);
            $table->float('shipping_cost', 20, 2)->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

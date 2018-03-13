<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->nulllable();
            $table->decimal('value');
            $table->string('unit');
            $table->date('valid_from');
            $table->date('valid_until');
            $table->string('coupon_code');
            $table->decimal('minimum_order_value');
            $table->decimal('maximum_discount_amount');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('product_discounts');
    }
}

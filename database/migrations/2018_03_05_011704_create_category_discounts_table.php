<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->nulllable();
            $table->decimal('value');
            $table->string('unit');
            $table->date('valid_from');
            $table->date('valid_until');
            $table->string('coupon_code');
            $table->decimal('minimum_order_value');
            $table->decimal('maximum_discount_amount');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('category_discounts');
    }
}

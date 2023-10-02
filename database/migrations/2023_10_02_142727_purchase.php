<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->dateTime('purchase_date');
            $table->bigInteger('quantity');
            $table->bigInteger('total_price')->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchases');
    }

};

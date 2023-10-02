<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->string('product_name');
            $table->string('description');
            $table->bigInteger('price')->unsigned();
            $table->bigInteger('stock')->unsigned();
			$table->softDeletes();

        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};

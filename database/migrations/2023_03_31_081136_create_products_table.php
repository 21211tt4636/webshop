<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');//tên sản phẩm
            $table->integer('manu_id');//id hãng(brand)
            $table->integer('type_id');//id loại
            $table->integer('qty');//số lượng
            $table->integer('price')->nullable();//giá
            $table->integer('sell_number')->nullable();//số lượng bán
            $table->string('image');//ảnh
            $table->text('description')->nullable();//mô tả
            $table->integer('feature');
            $table->double('discount')->nullable();//giảm giá
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
        Schema::dropIfExists('products');
    }
};

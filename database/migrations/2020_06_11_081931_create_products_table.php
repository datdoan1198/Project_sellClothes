<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('name')->comment('tên sản phẩm');
            $table->string('slug')->comment('chú thích trên url')->nullable();
            $table->bigInteger('category_id')->comment('sản phẩn liên quan đến danh mục và có liên kết với bản catogories')->nullable();
            $table->string('trade_mark')->comment('thương hiệu của phẩm');
            $table->boolean('status')->comment('trạng thái của sản phẩm');
            $table->boolean('gender')->comment('sản phẩm dành cho nam hoặc nữ');
            $table->bigInteger('price')->comment('giá bán của sản phẩm');
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
}

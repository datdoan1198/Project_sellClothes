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
            $table->bigInteger('category_id')->comment('sản phẩn liên quan đến danh mục và có liên kết với bản catogories')->nullable();
            $table->bigInteger('user_id')->comment('user có liên quan')->nullable();
            $table->bigInteger('collection_id')->comment('sản phẩm liên quan đến bộ sư tập')->nullable();
            $table->boolean('gender')->comment('sản phẩm dành cho nam hoặc nữ')->nullable();
            $table->bigInteger('price')->comment('giá bán của sản phẩm')->nullable();
            $table->integer('discount_percent')->comment('phần trăm giảm giá')->nullable();
            $table->boolean('status')->comment('trạng thái của sản phẩm')->default('1');
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

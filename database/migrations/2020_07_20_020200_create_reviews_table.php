<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('người bình luận');
            $table->integer('user_id')->comment('id người dùng')->default(0);
            $table->integer('product_id')->comment('id sản phẩm')->nullable();
            $table->string('content')->comment('nội dung đánh giá')->nullable();
            $table->tinyInteger('star')->comment('điểm đánh giá')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}

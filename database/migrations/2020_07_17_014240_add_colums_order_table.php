<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('user_id')->comment('id người mua hàng')->nullable()->after('name');
            $table->string('email')->comment('eamil người mua hàng')->nullable()->after('user_id');
            $table->string('address')->comment('địa chỉ giao hàng')->nullable()->after('email');    
            $table->bigInteger('phone')->comment('số điện thoại người giao hàng')->after('address')->nullable();
            $table->tinyInteger('status')->comment('trạng thái hoạt động')->after('phone')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}

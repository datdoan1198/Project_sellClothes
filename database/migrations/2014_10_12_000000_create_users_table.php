<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('tên user');
            $table->string('email')->unique()->comment('email user');
            $table->bigInteger('phone')->comment('số điện thoại  user')->nullable();
            $table->string('address')->comment('địa chỉ user')->nullable();
            // $table->timestamp('email_verified_at')->nullable()->comment('thời gian email xác nhận tài khoản');
            $table->string('password')->comment('mật khẩu user');
            $table->longText('image')->comment('ảnh user')->nullable();
            // $table->rememberToken()->comment('nhớ đăng nhập');
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
        Schema::dropIfExists('users');
    }
}

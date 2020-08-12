<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user', function (Blueprint $table) {
            $table->id()->comment('用戶表主鍵');
            $table->string('user_name',60)->comment('用戶名');
            $table->string('user_pass',256)->comment('密碼');
            $table->timestamps();
            $table->unique('user_name');
        });
        // \DB::statement("ALTER TABLE `admin_user` comment '後台用戶表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_user');
    }
}

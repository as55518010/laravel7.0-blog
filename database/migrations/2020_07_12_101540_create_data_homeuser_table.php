<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataHomeuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_homeuser', function (Blueprint $table) {
            $table->id()->comment('用戶表主鍵');
            $table->string('user_name', 60)->comment('用戶名');
            $table->string('user_pass', 255)->comment('密碼');
            $table->integer('phone')->default(0)->comment('電話號碼');
            $table->string('email', 255)->comment('信箱');
            $table->string('token', 255)->comment('token');
            $table->tinyInteger('active')->default(0)->comment('是否激活:1激活 0未激活');
            $table->timestamps();
            $table->unique('user_name');
        });


        // DB::statement("ALTER TABLE `data_homeuser` comment '前台用戶表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_homeuser');
    }
}

<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateblogUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id()->comment('用戶表主鍵');
            $table->string('user_name',50)->default('')->comment('用戶名');
            $table->string('user_pass',255)->default('')->comment('密碼');
            $table->string('email',255)->default(NULL)->comment('郵箱');
            $table->string('phone',11)->default(NULL)->comment('電話');
            $table->unsignedTinyInteger('status')->default(1)->comment('用戶狀態  1 啟用 0禁用');
            $table->unsignedTinyInteger('active')->default(0)->comment('賬號是否激活 0 未激活  1 激活');
            $table->string('token',255)->default(NULL)->comment('驗證賬號有效性');
            $table->string('expire',255)->default(NULL)->comment('賬號激活是否過期時間');
            $table->timestamps();
            $table->unique('user_name');
            $table->softDeletesTz(0);
        });
        DB::statement("ALTER TABLE `blog_user` comment '管理員'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
    //  */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
//

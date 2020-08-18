<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateblogHomeuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeuser', function (Blueprint $table) {
            $table->id()->comment('用戶表主鍵');
            $table->string('user_name', 50)->default('')->comment('用戶名');
            $table->string('user_pass', 255)->default('')->comment('密碼');
            $table->string('phone', 11)->default('')->comment('密碼');
            $table->string('email', 255)->default('')->comment('信箱');
            $table->string('token', 255)->default('')->comment('token');
            $table->unsignedTinyInteger('active')->default(0)->comment('是否激活:1激活 0未激活');
            $table->unsignedInteger('expire')->default(NULL)->comment('最後允許激活的時間');
            $table->string('identifier', 255)->default('')->comment('第二身份標示');
            $table->timestamps();
            $table->unique('user_name');
            $table->softDeletesTz(0);
        });
        DB::statement("ALTER TABLE `blog_homeuser` comment '前台用戶表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homeuser');
    }
}

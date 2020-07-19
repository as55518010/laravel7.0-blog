<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_permission', function (Blueprint $table) {
            $table->id()->comment('權限ID');
            $table->string('per_name', 255)->comment('權限名');
            $table->string('per_url', 255)->comment('權限對應路由');
            $table->timestamps();
        });
        \DB::statement("ALTER TABLE `blog_permission` comment '權限'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_permission');
    }
}

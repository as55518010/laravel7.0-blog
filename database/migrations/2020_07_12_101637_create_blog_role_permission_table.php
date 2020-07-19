<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogRolePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_role_permission', function (Blueprint $table) {
            $table->integer('role_id')->comment('角色表關聯的外鍵');
            $table->integer('permission_id')->comment('權限表關聯的外鍵');
            $table->timestamps();
        });
        \DB::statement("ALTER TABLE `blog_role_permission` comment '角色權限關聯'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_role_permission');
    }
}

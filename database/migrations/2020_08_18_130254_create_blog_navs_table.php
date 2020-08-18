<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogNavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navs', function (Blueprint $table) {
            $table->id();
            $table->string('nav_name')->default('')->comment('名稱');
            $table->string('nav_alias')->default('')->comment('別名');
            $table->string('nav_url')->default('')->comment('url');
            $table->unsignedInteger('nav_order')->default(0)->comment('排序');
            $table->timestamps();
        });
        \DB::statement("ALTER TABLE `blog_navs` comment '導航'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navs');
    }
}

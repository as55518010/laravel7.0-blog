<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id()->comment('友情鏈接ID');
            $table->string('link_name', 255)->default('')->comment('鏈接名');
            $table->string('link_title', 255)->default('')->comment('鏈接標題');
            $table->string('link_url', 255)->default('')->comment('鏈接URL');
            $table->unsignedInteger('link_order')->default(0)->comment('排序');
            $table->timestamps();
            $table->softDeletesTz(0);
        });
        \DB::statement("ALTER TABLE `blog_links` comment '友情鏈接'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}

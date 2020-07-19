<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCollectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_collect', function (Blueprint $table) {
            $table->id();
            $table->integer('art_id')->default(0)->comment('收藏文章ID');
            $table->integer('uid')->default(0)->comment('收藏人ID');
            $table->timestamps();
        });
        \DB::statement("ALTER TABLE `blog_collect` comment '文章收藏'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_collect');
    }
}

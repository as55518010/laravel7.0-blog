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
        Schema::create('collect', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('art_id')->default(0)->comment('收藏文章ID');
            $table->unsignedInteger('uid')->default(0)->comment('收藏人ID');
            $table->timestamps();
            $table->softDeletesTz(0);
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
        Schema::dropIfExists('collect');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_article', function (Blueprint $table) {
            $table->id()->comment('文章表主鍵');
            $table->string('art_title', 60)->comment('文章標題');
            $table->string('art_tag', 60)->comment('文章標籤');
            $table->string('art_description', 255)->comment('文章描述');
            $table->string('art_thumb', 255)->comment('文章縮略圖');
            $table->text('art_content')->comment('文章內容');
            $table->integer('art_time')->default(0)->comment('文章發布時間');
            $table->string('art_editor',60)->comment('文章作者');
            $table->integer('art_view')->default(0)->comment('文章瀏覽次數');
            $table->integer('cate_id')->default(0)->comment('文章分類ID');
            $table->integer('art_status')->default(0)->comment('文章推薦');
            $table->integer('art_love')->default(0)->comment('文章點讚');
            $table->integer('art_collect')->default(0)->comment('文章收藏');
            $table->timestamps();
        });
        // \DB::statement("ALTER TABLE `blog_article` comment '文章表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_article');
    }
}

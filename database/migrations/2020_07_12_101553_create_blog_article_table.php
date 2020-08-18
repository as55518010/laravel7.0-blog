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
        Schema::create('article', function (Blueprint $table) {
            $table->id()->comment('文章表主鍵');
            $table->string('art_title', 100)->default('')->comment('文章標題');
            $table->string('art_tag', 100)->default('')->comment('關鍵詞');
            $table->string('art_description', 255)->default('')->comment('描述');
            $table->string('art_thumb', 255)->default('')->comment('縮略圖');
            $table->text('art_content')->comment('文章內容');
            $table->unsignedInteger('art_time')->default(0)->comment('發布時間');
            $table->string('art_editor',50)->comment('文章作者');
            $table->unsignedInteger('art_view')->default(0)->comment('查看次數');
            $table->unsignedInteger('cate_id')->default(0)->comment('分類id');
            $table->unsignedTinyInteger('art_status')->default(0)->comment('是否添加到推薦位 0 不添加 1 添加');
            $table->unsignedInteger('art_love')->default(0)->comment('收藏量');
            $table->unsignedInteger('art_collect')->default(0)->comment('收藏量');
            $table->timestamps();
            $table->softDeletesTz(0);
        });
        \DB::statement("ALTER TABLE `blog_article` comment '文章'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}

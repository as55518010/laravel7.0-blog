<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comment', function (Blueprint $table) {
            $table->id();
            $table->integer('uid')->default(0)->comment('評論人ID');
            $table->string('nickname', 255)->comment('用戶暱稱');
            $table->string('head_pic', 255)->comment('用戶頭像');
            $table->text('content')->comment('評論內容');
            $table->integer('post_ip')->default(0)->comment('所屬文章ID');
            $table->timestamps();
        });
        \DB::statement("ALTER TABLE `blog_comment` comment '文章評論'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_comment');
    }
}

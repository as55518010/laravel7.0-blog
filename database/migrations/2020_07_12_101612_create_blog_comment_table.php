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
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('parent_id')->default(0)->comment('上級評論id,若是一級評論則為0');
            $table->string('nickname', 100)->default(null)->comment('用戶暱稱');
            $table->string('head_pic', 400)->default(null)->comment('用戶頭像');
            $table->text('content')->comment('評論內容');
            $table->unsignedInteger('post_ip')->default(null)->comment('評論所屬文章的ID');
            $table->timestamps();
            $table->softDeletesTz(0);
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
        Schema::dropIfExists('comment');
    }
}

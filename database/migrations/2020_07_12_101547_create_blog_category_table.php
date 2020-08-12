<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_category', function (Blueprint $table) {
            $table->id()->comment('分類表主鍵');
            $table->string('cate_name', 60)->comment('分類名稱');
            $table->string('cate_title', 60)->comment('分類別名');
            $table->integer('cate_order')->default(0)->comment('排序');
            $table->integer('cate_pid')->default(0)->comment('父ID');
            $table->timestamps();
            $table->unique('cate_name');
        });
        // \DB::statement("ALTER TABLE `blog_category` comment '前台用戶表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_category');
    }
}

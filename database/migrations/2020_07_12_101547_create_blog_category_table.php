<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateblogCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id()->comment('分類表主鍵');
            $table->string('cate_name', 50)->default('')->comment('分類名稱');
            $table->string('cate_title', 255)->default('')->comment('分類別名');
            $table->unsignedInteger('cate_order')->default(0)->comment('排序');
            $table->unsignedInteger('cate_pid')->default(0)->comment('父ID');
            $table->timestamps();
            $table->unique('cate_name');
            $table->softDeletesTz(0);
        });
        \DB::statement("ALTER TABLE `blog_category` comment '文章分類'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}

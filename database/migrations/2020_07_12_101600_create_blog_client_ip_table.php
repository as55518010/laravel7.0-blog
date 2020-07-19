<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogClientIpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_client_ip', function (Blueprint $table) {
            $table->id();
            $table->integer('art_id')->default(0)->comment('文章ID');
            $table->string('ip', 255)->comment('ip');
            $table->timestamps();
        });
        \DB::statement("ALTER TABLE `blog_client_ip` comment '文章點讚紀錄'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_client_ip');
    }
}

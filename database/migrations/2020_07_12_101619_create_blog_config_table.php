<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->id()->comment('配置ID');
            $table->string('conf_title', 50)->default('')->comment('標題');
            $table->string('conf_name', 50)->default('')->comment('變量名');
            $table->text('conf_content')->comment('變量值');
            $table->unsignedInteger('conf_order')->default(0)->comment('排序');
            $table->string('conf_tips', 255)->default('')->comment('描述');
            $table->string('field_type', 50)->default('')->comment('字段類型');
            $table->string('field_value', 255)->default('')->comment('類型值');
            $table->timestamps();
            $table->softDeletesTz(0);
        });
        \DB::statement("ALTER TABLE `blog_config` comment '網站配置'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config');
    }
}

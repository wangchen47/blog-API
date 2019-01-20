<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('articles',function (Blueprint $table){
        $table->increments('id');
        $table->unsignedInteger('created_user_id');
        $table->unsignedInteger('tech_category_id');
        $table->unsignedInteger('label_id');
        $table->string('title',255);
        $table->string('cover_url',255);
        $table->text('intro');
        $table->text('content');
        $table->string('url',255)->comment('访问路径');
        $table->string('created_time',100)->comment('创建时间');
        $table->unsignedInteger('count_views')->comment('阅读数量');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('article_comments',function (Blueprint $table){
        $table->increments('id')->comment('文章评价ID');
        $table->unsignedInteger('article_id')->comment('文章ID');
        $table->text('content')->comment('内容');
        $table->unsignedInteger('created_user_id')->index()->comment('写评价用户ID');
        $table->unsignedInteger('replied_comment_id')->default(0)->comment('回复评论ID');
        $table->unsignedInteger('replied_user_id')->default(0)->comment('回复用户ID');
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
        Schema::dropIfExists('article_comments');
    }
}

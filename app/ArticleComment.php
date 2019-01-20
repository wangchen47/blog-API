<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
  protected $fillable = [
    'id',
    'article_id',
    'content',
    'created_user_id',
    'replied_comment_id',
    'replied_user_id',
  ];

  protected $hidden = [
    'created_at',
    'updated_at',
  ];

  public function Article()
  {
    return $this->belongsTo(Article::class, 'article_id', 'id');
  }

  public function UserInfo()
  {
    return $this->belongsTo(UserInfo::class, 'created_user_id', 'user_id');
  }

  public function replyUserId()
  {
    return $this->belongsTo(UserInfo::class, 'replied_user_id', 'user_id');
  }

  public function articleComment()
  {
    return $this->belongsTo(ArticleComment::class, 'replied_comment_id', 'id');
  }
}

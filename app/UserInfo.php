<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
       'user_id',
       'real_name',
       'avatar_url',
    ];

    protected $hidden = [
       'created_at',
       'updated_at'
    ];

    public function user()
    {
      return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comment()
    {
      return $this->hasMany(ArticleComment::class, 'created_user_id', 'user_id');
    }

    public function replyUser()
    {
      return $this->hasMany(ArticleComment::class, 'replied_user_id', 'user_id');
    }

    public function article()
    {
      return $this->hasMany(Article::class, 'created_user_id','user_id');
    }
}

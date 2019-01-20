<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
       'id',
       'created_user_id',
       'tech_category_id',
       'label_id',
       'title',
       'cover_url',
       'intro',
       'content',
       'url',
       'created_time',
       'count_views',
    ];

    protected $hidden = [
       'created_at',
       'updated_at'
    ];

    public function ArticleComment()
    {
      return $this->hasMany(ArticleComment::class, 'article_id', 'id');
    }

    public function label()
    {
      return $this->belongsTo(Label::class, 'label_id', 'id');
    }

    public function TechCategory()
    {
      return $this->belongsTo(TechCategory::class, 'tech_category_id', 'id');
    }

    public function userInfo()
    {
      return $this->belongsTo(UserInfo::class, 'created_user_id', 'user_id');
    }
}

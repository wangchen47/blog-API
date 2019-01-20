<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechCategory extends Model
{
  protected $fillable = [
    'id',
    'name',
    'icon_url',
  ];

  protected $hidden = [
    'created_at',
    'updated_at',
  ];

  public function article()
  {
    return $this->hasMany(Article::class, 'tech_category_id', 'id');
  }
}

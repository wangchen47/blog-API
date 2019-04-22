<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
  protected $fillable = [
    'id',
    'name',
  ];

  protected $hidden = [
    'created_at',
    'updated_at'
  ];

  public function article()
  {
    return $this->hasMany(Article::class, 'label_id', 'id');
  }
}

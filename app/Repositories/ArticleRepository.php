<?php
namespace App\Repositories;

use App\Article;
use App\Repositories\Interfaces\ArticleInterface;

class ArticleRepository implements ArticleInterface {

  public function getArticles($filter, $pageSize)
  {
    $query = Article::with('label', 'techCategory', 'userInfo')->orderBy('created_at', 'desc');

    if ($filter) {
      $filter = "%{$filter}%";
      $query->where('title', 'like', $filter)
            ->orWhere('intro', 'like', $filter);
    }
    return $query->paginate($pageSize);
  }

  public function getFiliter($filter, $pageSize)
  {
    $query = Article::with('label', 'techCategory', 'userInfo')->orderBy('created_at', 'desc');

    if ($filter) {
      $filter = "%{$filter}%";
      $query->where('name', 'like', $filter);
    }
    return $query->paginate($pageSize);
  }
}
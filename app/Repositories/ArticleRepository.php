<?php
namespace App\Repositories;

use App\Article;
use App\Repositories\Interfaces\ArticleInterface;

class ArticleRepository implements ArticleInterface {

  public function getArticles($filter, $pageSize)
  {
    $query = Article::with('label', 'techCategory', 'user')->orderBy('created_at', 'desc');

    if ($filter) {
      $filter = "%{$filter}%";
      $query->where('title', 'like', $filter)
            ->orWhere('intro', 'like', $filter);
    }
    return $query->paginate($pageSize);
  }

  public function getFiliter($id, $pageSize)
  {
    $query = Article::with('label', 'techCategory', 'userInfo')->orderBy('articles.created_at', 'articles.desc');

    if ($id) {
      $query->leftJoin('tech_categories','articles.tech_category_id','tech_categories.id');
      $query->where('tech_categories.id', $id);
    }
    return $query->paginate($pageSize);
  }

  public function createArticles($title, $intro, $content, $tech_category_id, $label_id, $created_user_id)
  {
    return Article::create(['title' => $title], ['intro' => $intro],
      ['content' => $content], ['tech_category_id' => $tech_category_id], ['label_id' => $label_id], ['created_user_id' => $created_user_id]);
  }
}
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
      //dd($filter);
      $query->where('title', 'like', $filter)
            ->orWhere('intro', 'like', $filter);
    }
    return $query->paginate($pageSize);
  }

  public function getFiliter($id, $pageSize)
  {
    $query = Article::with('label', 'techCategory', 'user')->orderBy('articles.created_at', 'articles.desc');

    if ($id) {
      $query->leftJoin('tech_categories','articles.tech_category_id','tech_categories.id');
      $query->where('tech_categories.id', $id);
    }
    return $query->paginate($pageSize);
  }

  public function createArticles($title, $intro, $content, $tech_category_id, $label_id, $created_user_id)
  {
    $input = ['title' => $title, 'intro' => $intro, 'content' => $content,
              'tech_category_id' => $tech_category_id, 'label_id' => $label_id, 'created_user_id' => $created_user_id];
    return Article::create($input);
  }

  public function deleteById($id)
  {
    return Article::destroy([$id]);
  }

  public function editArticleById($id)
  {
    $query = Article::with('label', 'techCategory', 'user')->orderBy('created_at', 'desc');

    return $query->find($id);
  }

  public function updateArticle($id ,$title, $intro, $content, $tech_category_id, $label_id, $created_user_id)
  {
    $input = ['title' => $title, 'intro' => $intro, 'content' => $content,
             'tech_category_id' => $tech_category_id, 'label_id' => $label_id, 'created_user_id' => $created_user_id];
    return Article::where('id', $id)->update($input);
  }
}
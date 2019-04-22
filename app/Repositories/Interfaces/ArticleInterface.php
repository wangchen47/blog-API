<?php
namespace App\Repositories\Interfaces;

interface ArticleInterface {

  public function getArticles($filter, $pageSize);

  public function getFiliter($id, $pageSize);

  public function createArticles($title, $intro, $content, $tech_category_id, $label_id, $created_user_id);

  public function deleteById($id);

  public function editArticleById($id);

  public function updateArticle($id ,$title, $intro, $content, $tech_category_id, $label_id, $created_user_id);

}
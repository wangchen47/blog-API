<?php
namespace App\Repositories\Interfaces;

interface ArticleInterface {

  public function getArticles($filter, $pageSize);

  public function getFiliter($filter, $pageSize);

}
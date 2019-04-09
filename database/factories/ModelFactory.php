<?php

use App\Article;
use App\ArticleComment;
use App\Label;
use App\TechCategory;
use App\User;
use App\UserInfo;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'password' => sha1('123456'),
    ];
});

$factory->define(UserInfo::class, function (Faker $faker) {
    return [
       'user_id' => $faker->unique()->numberBetween(1,30),
       'real_name' => $faker->lastName,
    ];
});


$factory->define(Article::class, function (Faker $faker) {
    return [
      'created_user_id' => $faker->numberBetween(1,30),
      'tech_category_id' => $faker->numberBetween(1,5),
      'label_id' => $faker->numberBetween(1,5),
      'title' => $faker->sentence(6),
      'intro' => $faker->paragraph(3),
      'content' => $faker->text(150),
      'count_views' => $faker->numberBetween(1,20),
    ];
});

$factory->define(ArticleComment::class, function (Faker $faker) {
    return [
      'article_id' => $faker->numberBetween(1,30),
      'content' => $faker->text(20),
      'created_user_id' => $faker->numberBetween(1,30),
      'replied_comment_id' => $faker->numberBetween(1,30),
      'replied_user_id' => $faker->numberBetween(1,30),
    ];
});

$factory->define(TechCategory::class,function (Faker $faker) {
   return [


   ];
});

$factory->define(Label::class,function (Faker $faker) {
   return [


   ];
});

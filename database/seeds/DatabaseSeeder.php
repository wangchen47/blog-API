<?php

use App\Article;
use App\ArticleComment;
use App\User;
use App\UserInfo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TechLevelSeeder::class);

        factory(User::class,30)->create();
        factory(UserInfo::class,30)->create();
        factory(Article::class,30)->create();
        factory(ArticleComment::class,30)->create();
    }
}

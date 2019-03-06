<?php

namespace App\Providers;

use App\Repositories\ArticleRepository;
use App\Repositories\Interfaces\ArticleInterface;
use App\Repositories\Interfaces\UserInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(ArticleInterface::class, ArticleRepository::class);
    }
}

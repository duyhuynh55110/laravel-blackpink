<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\PostRepository::class, \App\Repositories\PostRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoryRepository::class, \App\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PostCommentRepository::class, \App\Repositories\PostCommentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CommentRepository::class, \App\Repositories\CommentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\EmotionRepository::class, \App\Repositories\EmotionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LikeRepository::class, \App\Repositories\LikeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LikeRepository::class, \App\Repositories\LikeRepositoryEloquent::class);
        //:end-bindings:
    }
}

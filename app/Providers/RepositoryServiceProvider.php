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
        $this->app->singleton(
            \App\Repositories\Contracts\UserInterface::class,
            \App\Repositories\Eloquent\UserRepository::class,
        );

        $this->app->singleton(
            \App\Repositories\Contracts\CategoryInterface::class,
            \App\Repositories\Eloquent\CategoryRepository::class,
        );
        
        $this->app->singleton(
            \App\Repositories\Contracts\ProductInterface::class,
            \App\Repositories\Eloquent\ProductRepository::class,
        );

        $this->app->singleton(
            \App\Repositories\Contracts\PostInterface::class,
            \App\Repositories\Eloquent\PostRepository::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace App\Providers\Admin;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryModel;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepositoryModel::class , function(){
            return new CategoryRepository();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

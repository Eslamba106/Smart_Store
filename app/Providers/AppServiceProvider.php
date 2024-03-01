<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $mainproducts = Product::all();
        $maincategories = Category::all();
        $mainbrands = Brand::all();
        view()->share('mainproducts', $mainproducts);
        view()->share('maincategories' , $maincategories);
        view()->share('mainbrands' , $mainbrands);
        Paginator::useBootstrapFour();
    }
}

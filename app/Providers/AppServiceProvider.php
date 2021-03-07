<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Agent\Agent;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        $product = Product::all();
//        view::share('product ', $product );
        Paginator::useBootstrap();
        $categories = Category::all();
        view::share('categories', $categories);
        Schema::defaultstringLength(191);
    }
}

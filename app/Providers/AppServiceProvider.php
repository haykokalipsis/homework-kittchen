<?php

namespace App\Providers;

use App\Category;
use App\Product;
use Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Schema::defaultStringLength(191);

//        $inactiveProducts = Product::whereStatus('inactive');
        View::composer('admin/*', function($view) {
            $view->with('inactiveProducts', Product::whereStatus('inactive')->get());
        });

        View::composer(['front/pages/*'], function($view) {
            $allCategories = Category::where('parent_id', null)
                ->with(['sections'])
                ->get();

            $topCategories = collect([
                $allCategories[0],
                $allCategories[1],
                $allCategories[2],
                $allCategories[3]
            ]);

            $view->with([
                'allCategories' => $allCategories,
                'topCategories' => $topCategories
            ]);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

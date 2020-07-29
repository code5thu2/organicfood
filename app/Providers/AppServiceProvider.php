<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function ($view) {
            $view->with([
                'parentCat' => Category::where('parent_id', 0)->orderBy('name', 'ASC')->get(),
                // 'category' => Category::where('parent_id',0)->orderBy('name','ASC')->get();
            ]);
        });
    }
}

<?php

namespace App\Providers;

use App\Models\Blog;
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
                'parentCat' => Category::where(['parent_id' => 0, 'status' => 1])->orderBy('name', 'ASC')->get(),
                'new_blog' => Blog::where('status', 1)->limit(7)->orderBy('id', 'DESC')->get(),
            ]);
        });
    }
}

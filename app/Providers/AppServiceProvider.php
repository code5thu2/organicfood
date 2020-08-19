<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Category;
use App\Helper\CartHelper;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Tag;
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
        //Cus
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
                'Tag' => Tag::where('status', 1)->orderBy('name', 'ASC')->get(),
                'new_blog' => Blog::where('status', 1)->limit(7)->orderBy('id', 'DESC')->get(),
                'pro_hot' => Product::where('status', 5)->limit(5)->orderBy('id', 'DESC')->get(),
                'contact_view' => Contact::where('status', 1)->first(),
                'sup_slider' => Supplier::where('status', 1)->get(),
                'cat_menu' => Category::where(['status' => 1, 'parent_id' => 0, 'prioty' => 1])->limit(2)->get(),
                'cart' => new CartHelper()
            ]);
        });
    }
}

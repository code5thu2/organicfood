<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
//blog route
Route::get('/blog', 'Admin\BlogController@blog_list')->name('blogs.blog_list');
Route::get('/blog/{id}-{slug}', 'Admin\BlogController@blog_detail')->name('blogs.blog_detail');
//Product list
Route::get('/product-list', 'HomeController@product_list')->name('home.product_list');
Route::get('product-list/{id}-{slug}', 'HomeController@view')->name('home.view');
//Order
route::group(['prefix' => 'cart'], function () {
    route::get('/view', 'CartController@view')->name('cart.view');
    route::get('/add/{id}', 'CartController@add')->name('cart.add');
    route::get('/remove/{id}', 'CartController@remove')->name('cart.remove');
    route::get('/update/{id}', 'CartController@update')->name('cart.update');
    route::get('/clear', 'CartController@clear')->name('cart.clear');
});
//Order
route::group(['prefix' => 'checkout'], function () {
    route::get('/', 'CheckoutController@form')->name('checkout');
    route::post('/', 'CheckoutController@submit_form')->name('checkout');
});

route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {
    Route::get('/', 'AdminController@index')->name('index');
    route::resources([
        'categories' => 'CategoryController',
        'suppliers' => 'SupplierController',
        'units' => 'UnitController',
        'banners' => 'BannerController',
        'faqs' => 'FaqController',
        'products' => 'ProductController',
        'images' => 'ImageController',
        'roles' => 'RoleController',
        'users' => 'UserController',
        'blogs' => 'BlogController',
        'tags' => 'TagController',

    ]);
});

route::post('admin/login', 'Admin\AdminController@post_login')->name('admin.login');
route::get('admin/login', 'Admin\AdminController@login')->name('admin.login');
route::get('admin/logout', 'Admin\AdminController@logout')->name('admin.logout');
Route::get('admin/error', 'Admin\AdminController@error')->name('admin.error');

Route::get('/customer/login', 'CustomerController@login')->name('customer.login');
Route::post('/customer/login', 'CustomerController@post_login')->name('customer.post_login');
Route::post('/customer/register', 'CustomerController@register')->name('customer.register');
Route::group(['prefix' => 'customer', 'middleware' => 'cus'], function () {
    Route::get('logout', 'CustomerController@logout')->name('customer.logout');
    Route::get('profile', 'CustomerController@profile')->name('customer.profile');
    Route::get('order', 'CustomerController@order')->name('customer.order');
    Route::get('change_password', 'CustomerController@change_password')->name('customer.change_password');
    Route::post('comment/store', 'CommentController@store')->name('comment.store');
});

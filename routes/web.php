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

route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {
    Route::get('', 'AdminController@index')->name('index');
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

    ]);
});

route::post('admin/login', 'Admin\AdminController@post_login')->name('admin.login');
route::get('admin/login', 'Admin\AdminController@login')->name('admin.login');
route::get('admin/logout', 'Admin\AdminController@logout')->name('admin.logout');
Route::get('admin/error', 'Admin\AdminController@error')->name('admin.error');

Route::get('/customer/login', 'CustomerController@login')->name('customer.login');
Route::post('/customer/register', 'CustomerController@register')->name('customer.register');
Route::group(['prefix' => 'customer', 'middleware' => 'cus'], function () {
    Route::get('profile', 'CustomerController@profile')->name('customer.profile');
    Route::get('order', 'CustomerController@order')->name('customer.order');
    Route::get('change_password', 'CustomerController@change_password')->name('customer.change_password');
});

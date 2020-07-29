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
// Route::get('/home', 'HomeController@index')->name('home');

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
        'subcrises' => 'SubcriseController',
        
    ]);
});
route::post('admin/login', 'Admin\AdminController@post_login')->name('admin.login');
route::get('admin/login', 'Admin\AdminController@login')->name('admin.login');
route::get('admin/logout', 'Admin\AdminController@logout')->name('admin.logout');
Route::get('admin/error', 'Admin\AdminController@error')->name('admin.error');

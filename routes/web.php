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
//Trang contact
Route::get('contact', 'HomeController@contact')->name('home.contact');
Route::post('contact', 'HomeController@submit_feedback')->name('home.submit_feedback');
//Đăng ký subscribe
Route::get('/subscribe', 'SubscribeController@sign')->name('subscribe.sign');
//Order
route::group(['prefix' => 'cart'], function () {
    route::get('/view', 'CartController@view')->name('cart.view');
    route::get('/add/{id}', 'CartController@add')->name('cart.add');
    route::get('/remove/{id}', 'CartController@remove')->name('cart.remove');
    route::get('/update/{id}', 'CartController@update')->name('cart.update');
    route::get('/clear', 'CartController@clear')->name('cart.clear');
});
//checkout
route::group(['prefix' => 'checkout'], function () {
    route::get('/', 'CheckoutController@form')->name('checkout');
    route::post('/', 'CheckoutController@submit_form')->name('checkout');
});

//rating
route::group(['prefix' => 'rating'], function () {
    route::post('/', 'RatingController@submit_rating')->name('rating');
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
        'contact' => 'ContactController',
    ]);

    //Route thùng rác và khôi phục
    Route::get('/category-trash', 'CategoryController@trash')->name('categories.trash');
    Route::get('/category-restore/{id}', 'CategoryController@restore')->name('categories.restore');
    Route::get('/product-trash', 'ProductController@trash')->name('products.trash');
    Route::get('/product-restore/{id}', 'ProductController@restore')->name('products.restore');
    Route::get('/supplier-trash', 'SupplierController@trash')->name('suppliers.trash');
    Route::get('/supplier-restore/{id}', 'SupplierController@restore')->name('suppliers.restore');

    // Route quản lý đơn hàng
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/{id}', 'OrderController@show')->name('orders.show');
    Route::put('/orders/status-update/{id}-{status}', 'OrderController@status_update')->name('orders.status_update');

    //Route quản lý người dùng
    route::get('/customer-list', 'AdminController@customer_list')->name('customers.customer_list');
    route::put('/customer-update-status/{id}', 'AdminController@customer_update_status')->name('customers.customer_update_status');

    //Route quản lý email đăng ký
    route::get('/subscribe-list', 'AdminController@subscribe_list')->name('subscribe_list');
    route::delete('/subscribe-list/{id}', 'AdminController@subscribe_del')->name('subscribe_del');

    //Quản lý phản hồi khách hàng
    route::get('/feedback-list', 'AdminController@feedback_list')->name('feedback_list');
    route::get('/feedback-list/reply/{id}', 'AdminController@reply_feedback')->name('reply_feedback');
    //Route quản lý ratting sản phẩm
    route::get('/rating-list', 'AdminController@rating_list')->name('rating_list');
    route::delete('/rating-list/{id}', 'AdminController@rating_del')->name('rating_del');
    route::get('/rating-list/{id}', 'AdminController@rating_up')->name('rating_up');
});

route::post('admin/login', 'Admin\AdminController@post_login')->name('admin.login');
route::get('admin/login', 'Admin\AdminController@login')->name('admin.login');
route::get('admin/logout', 'Admin\AdminController@logout')->name('admin.logout');
Route::get('admin/error', 'Admin\AdminController@error')->name('admin.error');

//Quản lý comment
Route::get('admin/comments', 'Admin\AdminController@comment_list')->name('admin.comment_list');
Route::delete('admin/comments/{id}', 'Admin\AdminController@comment_del')->name('admin.comment_del');

Route::group(['prefix' => 'customer'], function () {
    Route::get('/login', 'CustomerController@login')->name('customer.login');
    Route::post('/login', 'CustomerController@post_login')->name('customer.post_login');
    Route::post('/register', 'CustomerController@register')->name('customer.register');
    Route::get('/verify-account', 'CustomerController@verify_account')->name('customer.verify_account');
    Route::get('/forgot-password', 'CustomerController@forgot_password')->name('customer.forgot_password');
    Route::post('/send-code', 'CustomerController@send_code')->name('customer.send_code');
    Route::get('/reset-password', 'CustomerController@reset_password')->name('customer.reset_password');
    Route::post('/confirm_reset-password', 'CustomerController@confirm_reset_password')->name('customer.confirm_reset_password');
});

Route::group(['prefix' => 'customer', 'middleware' => 'cus'], function () {
    Route::get('logout', 'CustomerController@logout')->name('customer.logout');
    Route::get('profile', 'CustomerController@profile')->name('customer.profile');
    Route::get('order', 'CustomerController@order')->name('customer.order');
    Route::get('change_password', 'CustomerController@change_password')->name('customer.change_password');
    Route::post('comment/store', 'CommentController@store')->name('comment.store');
});

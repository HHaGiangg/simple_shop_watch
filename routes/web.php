<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
//Dky/dang nhap
Route::group(['namespace' => 'Auth','prefix'=>'account'], function(){
    Route::get('/register','RegisterController@getFormRegister')->name('get.register');
    Route::post('/register','RegisterController@postFormRegister');

    Route::get('/login','LoginController@getFormLogin')->name('get.login');
    Route::post('/login','LoginController@postFormLogin');

    Route::get('/logout','LoginController@getLogout')->name('get.logout');

    Route::get('reset-password','ResetPasswordController@getEmailReset')->name('get.email_reset_password');
    Route::post('reset-password','ResetPasswordController@checkEmailReset');

    Route::get('new-password','ResetPasswordController@newPassword')->name('get.new_password');
    Route::post('new-password','ResetPasswordController@savePassword');

});

//Product, Category, Bài viết
Route::group(['namespace' =>'Frontend'], function (){
   Route::get('/', 'HomeController@index')->name('get.home');
   Route::get('/san-pham', 'ProductController@index')->name('get.product.list');
   Route::get('/san-pham/{slug}/{category}', 'ProductController@show')->name('get.product.show');
   Route::get('/san-pham-chi-tiet/{slug}/{id}', 'ProductDetailController@ProductDetail')->name('get.product.detail');

//   Bài viết
    //    Bài viết
    Route::get('/bai-viet', 'BlogController@index')->name('get.blog.home');
    Route::get('/bai-viet/{slug}','ArticleDetailController@index')->name('get.blog.detail');


//   Gio Hang
    Route::get('don-hang', 'ShoppingCartController@index')->name('get.shopping.list');
    Route::prefix('shopping')->group(function () {
        Route::get('/add/{id}', 'ShoppingCartController@add')->name('get.shopping.add');
        Route::get('delete/{id}','ShoppingCartController@delete')->name('get.shopping.delete');
        Route::get('update/{id}','ShoppingCartController@update')->name('ajax_get.shopping.update');
        Route::get('delete-all','ShoppingCartController@deleteAll')->name('get.shopping.deleteAll');

//        Thanh toan
        Route::get('/pay','PayController@getPay')->name('get.shopping.pay');
        Route::post('/pay','PayController@postPay')->name('get.shopping.pay');
//        Route::post('/pay','ShoppingCartController@postPay')->name('post.shopping.pay');
//        Route::post('pay','ShoppingCartController@postPayMent')->name('get.shopping.payment');
    });
});




include 'route_admin.php';
include 'route_user.php';

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

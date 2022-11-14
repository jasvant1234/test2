<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gents\Gentscontroller;
use App\Http\Controllers\All\Allcontroller;
use App\Http\Controllers\Ladies\LadiesController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('clear_cache', function () {

    \Artisan::call('optimize:clear');
    return redirect()->back()->with("success","Cache is cleared");

});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/shop_view', [App\Http\Controllers\HomeController::class, 'shop_view'])->name('shop_view');
Route::get('/cart_view', [App\Http\Controllers\HomeController::class, 'cart_view'])->name('cart_view');
Route::get('/get_gents', [App\Http\Controllers\HomeController::class, 'get_gents'])->name('get_gents');
Route::get('/get_womens', [App\Http\Controllers\HomeController::class, 'get_womens'])->name('get_womens');
Route::get('/get_childs', [App\Http\Controllers\HomeController::class, 'get_childs'])->name('get_childs');
Route::get('/get_shirts', [App\Http\Controllers\HomeController::class, 'get_shirts'])->name('get_shirts');
Route::get('/get_jeans', [App\Http\Controllers\HomeController::class, 'get_jeans'])->name('get_jeans');
Route::get('/contact_view', [App\Http\Controllers\HomeController::class, 'contact_view'])->name('contact_view');
Route::get('/view_details/{id}', [App\Http\Controllers\HomeController::class, 'view_details'])->name('view_details');
Route::get('/click_details/{id}', [App\Http\Controllers\HomeController::class, 'click_details'])->name('click_details');
Route::get('/add_cart/{id}', [App\Http\Controllers\HomeController::class, 'add_cart'])->name('add_cart');
Route::get('/checkout_process/{id}', [App\Http\Controllers\HomeController::class, 'checkout_process'])->name('checkout_process');
Route::post('/sendmail', [App\Http\Controllers\HomeController::class, 'sendmail'])->name('sendmail');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::post('/save-likedislike', [App\Http\Controllers\HomeController::class,'save-likedislike'])->name('save-likedislike');
Route::post('/like-post', [App\Http\Controllers\HomeController::class,'likepost'])->name('like-post');
Route::post('/unlike-post', [App\Http\Controllers\HomeController::class,'unlikepost'])->name('unlike-post');

Route::group(['middleware' => ['role','auth']], function () {

    Route::get('/mail_details', [App\Http\Controllers\Admin\Mailcontroller::class, 'mail_details'])->name('mail_details');
    Route::get('/send_thanks_mail/{id}', [App\Http\Controllers\Admin\Mailcontroller::class, 'send_thanks_mail'])->name('send_thanks_mail');
    Route::post('/store_mail_thanks/{id}', [App\Http\Controllers\Admin\Mailcontroller::class, 'store_mail_thanks'])->name('store_mail_thanks');
    Route::get('/create_gents_clothes', [Gentscontroller::class, 'index'])->name('create_gents_clothes');
    Route::get('/delete_gents/{id}', [Gentscontroller::class, 'destroy'])->name('delete_gents');
    Route::get('/create_all_clothes', [Allcontroller::class, 'create'])->name('create_all_clothes');
    Route::get('/index', [Allcontroller::class, 'index'])->name('index');
    Route::get('/delete/{id}', [Allcontroller::class, 'destroy'])->name('delete_all_gents');
    Route::post('/gents_clothes_store', [Allcontroller::class, 'store'])->name('gents_clothes_store');
    Route::post('/gents_clothes_store', [Allcontroller::class, 'store'])->name('gents_clothes_store');
    Route::get('/create_ladies_clothes', [LadiesController::class, 'index'])->name('create_ladies_clothes');
    Route::get('/delete_ladies/{id}', [LadiesController::class, 'destroy'])->name('delete_ladies');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('users-send-email', [\App\Http\Controllers\UserController::class, 'sendEmail'])->name('ajax.send.email');

});

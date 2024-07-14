<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ContactController;
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

Route::post('/customer_register',[UserController::class,'customer_register'])->name('costomer_register');
Route::get('/user_register_form',[UserController::class,'user_register_form'])->name('user_register_form');
Route::post('/user_register',[UserController::class,'user_register'])->name('user_register');

Route::get('/',[FrontendController::class,'index'])->name('index');
Route::get('/cart',[FrontendController::class,'cart'])->name('cart');
Route::post('/cart',[FrontendController::class,'cart'])->name('cart');
Route::post('/add_cart/{id}',[FrontendController::class,'add_cart'])->name('add_cart');
Route::post('/add_cart',[FrontendController::class,'add_cart'])->name('add_cart');
Route::get('/add_cart',[FrontendController::class,'add_cart'])->name('add_cart');
Route::delete('/remove_cart/{id}', [FrontendController::class, 'remove_cart'])->name('remove_cart');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendController::class, 'contactform'])->name('contact.submit');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/order',[FrontendController::class,'order'])->name('order');
Route::post('/place-order', [FrontendController::class, 'placeOrder'])->name('placeOrder');
Route::get('/place-order', [FrontendController::class, 'placeOrder'])->name('placeOrder');
Route::get('/order_done',[FrontendController::class,'order_done'])->name('order_done');
Route::get('/product_detail/{id}',[FrontendController::class,'product_detail'])->name('product_detail');
Route::get('/search', [FrontendController::class, 'search'])->name('search');
Route::get('/category/{id}', [FrontendController::class, 'categoryItems'])->name('category.items');
Route::post('/update-cart-quantity', [FrontendController::class, 'updateCartQuantity'])->name('update_cart_quantity');
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/login_form',[LoginController::class,'login_form'])->name('login_form');

Route::middleware(['admin'])->group(function(){
    Route::get('/admin',[adminController::class,'admin'])->name('admin');
    Route::get('/admin_user',[UserController::class,'admin_user'])->name('admin_user');
    Route::get('/user_delete',[UserController::class,'user_delete'])->name('user_delete');
    Route::delete('/user_delete',[UserController::class,'user_delete'])->name('user_delete');
    Route::post('/user_create',[UserController::class,'user_create'])->name('user_create');
    Route::post('/user_update_code/{id}',[adminController::class,'user_update_code'])->name('user_update_code');
    Route::post('/admin_update_code/{id}',[adminController::class,'admin_update_code'])->name('admin_update_code');
    Route::post('/admin_create',[adminController::class,'admin_create'])->name('admin_create');
    Route::get('/edit/{id}',[adminController::class,'edit'])->name('edit');
    Route::get('/edit_user/{id}',[adminController::class,'edit_user'])->name('edit_user');
    Route::get('/admin_delete',[adminController::class,'admin_delete'])->name('admin_delete');
    Route::delete('/admin_delete',[adminController::class,'admin_delete'])->name('admin_delete');
    Route::get('/admin_category',[CategoryController::class,'admin_category'])->name('admin_category');
    Route::post('/admin_category',[CategoryController::class,'admin_category_insert'])->name('admin_category_insert');
    Route::get('/edit_category/{id}',[CategoryController::class,'edit_category'])->name('edit_category');
    Route::delete('/delete_category/{id}',[CategoryController::class,'delete_category'])->name('delete_category');
    Route::post('/update_category/{id}',[CategoryController::class,'update_category'])->name('update_category');
    Route::get('/admin_item',[ItemController::class,'admin_item'])->name('admin_item');
    Route::post('/admin_item',[ItemController::class,'admin_item_insert'])->name('admin_item_insert');
    Route::get('/item_list',[ItemController::class,'item_list'])->name('item_list');
    Route::delete('/item_delete/{id}',[ItemController::class,'item_delete'])->name('item_delete');
    Route::get('/item_delete/{id}',[ItemController::class,'item_delete'])->name('item_delete');
    Route::get('/edit_item/{id}', [ItemController::class, 'editem'])->name('editem');
    Route::post('/cart/update', [FrontendController::class, 'updateCart'])->name('update_cart');
    Route::post('/admin_item_edit/{id}', [ItemController::class, 'edit_item'])->name('edit_item');
    Route::delete('/delete_category/{id}',[CategoryController::class,'delete_category'])->name('delete_category');
    Route::get('/order_list',[OrderController::class,'order_list'])->name('order_list');
    Route::get('/admin/orders', [OrderController::class, 'order_list'])->name('admin.orders');
    Route::post('/admin/orders/confirm/{id}', [OrderController::class, 'confirm_order'])->name('admin.orders.confirm');
    Route::get('/admin/orders/confirm/{id}', [OrderController::class, 'confirm_order'])->name('admin.orders.confirm');
    Route::get('sales/report', [SalesController::class, 'salesReport'])->name('sales.report');
    Route::get('/message_list',[ContactController::class,'message_list'])->name('message_list');

});

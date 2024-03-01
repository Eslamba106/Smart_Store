<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CartitemController;
use App\Http\Controllers\admin\Auth\AuthController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(AuthController::class)->group(function () {

    Route::get('/login', 'loginPage')->name('admin.login-page')->middleware('guest:admin');
    Route::post('/login', 'login')->name('admin.login')->middleware('guest:admin');
    Route::get('register','registerPage')->name('admin.register-page')->middleware('guest:admin');
    Route::post('register','register')->name('admin.register')->middleware('guest:admin');
});
Route::get('/', fn()=>view('admin.dashboard.index'))->middleware('auth:admin')->name('admin.dashboard');
Route::get('products', function () {
    return view('pages.products');
});
Route::post('logout',[AuthController::class ,'logout'])->middleware('auth:admin')->name('admin.logout');


Route::resource('/brand' , BrandController::class);
// Route::resource('/category' , CategoryController::class)->middleware('auth:admin');
Route::controller(CategoryController::class)->group(function () {
    Route::get('category','index')->name('admin.category');
    Route::post('category/store','store')->name('admin.category.store');
    Route::get('category/create','create')->name('admin.category.create');
    Route::get('category/edit/{category}','edit')->name('admin.category.edit');
    Route::put('category/update/{id}','update')->name('admin.category.update');
    Route::get('category/delete','delete')->name('admin.category.delete');
});

Route::resource('/products' , ProductController::class);
// Route::resource('/cartitems' , CartitemController::class);
// Route::resource('/carts' , CartController::class);
// Route::get('/cartitems{id}/add' , [CartitemController::class , 'add'])->name('carts.add');
Route::get('/products{id}/delete' , [ProductController::class , 'delete'])->name('products.delete');
Route::get('/brand{id}/delete' , [BrandController::class , 'delete'])->name('brand.delete');
Route::get('/category{id}/delete' , [CategoryController::class , 'delete'])->name('category.delete');
// Route::get('/cartitems{id}/delete' , [CartitemController::class , 'delete'])->name('cartitems.delete');
// Route::get('/cart{id}/creates' , [CartController::class , 'create_cart'])->name('cart.creates');
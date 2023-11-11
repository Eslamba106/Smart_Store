<?php

use App\Models\Cart;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartitemController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products', function () {
    return view('pages.products');
});

Route::get('/admin', function () {
    return view('Admin.admin');
})->middleware('CheckAdmin')->name('admin');




Route::resource('/brand' , BrandController::class);
Route::resource('/category' , CategoryController::class);

Route::resource('/products' , ProductController::class);
Route::resource('/cartitems' , CartitemController::class);
Route::resource('/carts' , CartController::class);
Route::get('/cartitems{id}/add' , [CartitemController::class , 'add'])->name('carts.add');
Route::get('/products{id}/delete' , [ProductController::class , 'delete'])->name('products.delete');
Route::get('/brand{id}/delete' , [BrandController::class , 'delete'])->name('brand.delete');
Route::get('/category{id}/delete' , [CategoryController::class , 'delete'])->name('category.delete');
Route::get('/cartitems{id}/delete' , [CartitemController::class , 'delete'])->name('cartitems.delete');
Route::get('/cart{id}/creates' , [CartController::class , 'create_cart'])->name('cart.creates');
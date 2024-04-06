<?php

use Illuminate\Support\Facades\Route;
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

// Auth Routes 
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginPage')->name('admin.login-page')->middleware('guest:admin');
    Route::post('/login', 'login')->name('admin.login')->middleware('guest:admin');
    Route::get('register','registerPage')->name('admin.register-page')->middleware('guest:admin');
    Route::post('register','register')->name('admin.register')->middleware('guest:admin');
});

// Dashboard Routes
Route::get('/', fn()=>view('admin.dashboard.index'))->middleware('auth:admin')->name('admin.dashboard');
Route::get('products', function () {
    return view('pages.products');
});
Route::post('logout',[AuthController::class ,'logout'])->middleware('auth:admin')->name('admin.logout');


// Route::resource('/brand' , BrandController::class);
// Route::resource('/category' , CategoryController::class)->middleware('auth:admin');

Route::group([
    "middleware"=> ["auth:admin"],
    "as"=> "admin.",
    // "prefix" => "admin",
],
 function () {
    Route::get('categories',[CategoryController::class,'index'])->name('categories.index');
    Route::post('categories/store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('categories/create',[CategoryController::class,'create'])->name('categories.create');
    Route::get('categories/edit/{category}',[CategoryController::class,'edit'])->name('categories.edit');
    Route::put('categories/update/{id}',[CategoryController::class,'update'])->name('categories.update');
    Route::delete('categories/delete/{id}',[CategoryController::class,'delete'])->name('categories.delete');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('products','index')->middleware('auth:admin')->name('admin.products');
    Route::post('products/store','store')->middleware('auth:admin')->name('admin.products.store');
    Route::get('products/create','create')->middleware('auth:admin')->name('admin.products.create');
    Route::get('products/edit/{products}','edit')->middleware('auth:admin')->name('admin.products.edit');
    Route::put('products/update/{id}','update')->middleware('auth:admin')->name('admin.products.update');
    Route::get('products/delete','delete')->middleware('auth:admin')->name('admin.products.delete');
});
Route::controller(BrandController::class)->group(function () {
    Route::get('brands','index')->name('admin.brands');
    Route::post('brands/store','store')->name('admin.brands.store');
    Route::get('brands/create','create')->name('admin.brands.create');
    Route::get('brands/edit/{brands}','edit')->name('admin.brands.edit');
    Route::put('brands/update/{id}','update')->name('admin.brands.update');
    Route::delete('brands/delete/{id}','delete')->name('admin.brands.delete');
});

// Route::resource('/products' , ProductController::class);
// Route::resource('/cartitems' , CartitemController::class);
// Route::resource('/carts' , CartController::class);
// Route::get('/cartitems{id}/add' , [CartitemController::class , 'add'])->name('carts.add');
// Route::get('/products{id}/delete' , [ProductController::class , 'delete'])->name('products.delete');
Route::get('/brand{id}/delete' , [BrandController::class , 'delete'])->name('brand.delete');
Route::get('/category{id}/delete' , [CategoryController::class , 'delete'])->name('category.delete');
// Route::get('/cartitems{id}/delete' , [CartitemController::class , 'delete'])->name('cartitems.delete');
// Route::get('/cart{id}/creates' , [CartController::class , 'create_cart'])->name('cart.creates');





// Route::controller(CategoryController::class)->group(function () {
//     Route::get('categories','index')->name('admin.categories');
//     Route::post('categories/store','store')->name('admin.categories.store');
//     Route::get('categories/create','create')->name('admin.categories.create');
//     Route::get('categories/edit/{category}','edit')->name('admin.categories.edit');
//     Route::put('categories/update/{id}','update')->name('admin.categories.update');
//     Route::get('categories/delete','delete')->name('admin.categories.delete');
// });
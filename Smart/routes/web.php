<?php

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
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
})->name('admin');
// Route::get('/admin/addcategory', function () {
//     return view('Admin.category');
// })->name('admin.department');


// Route::get('/admin/addproduct', function () {
//     return view('Admin.product');
// })->name('admin.product');



Route::resource('/brand' , BrandController::class);
Route::resource('/category' , CategoryController::class);

Route::resource('/products' , ProductController::class);
Route::get('/products{id}/delete' , [ProductController::class , 'delete'])->name('products.delete');
Route::get('/brand{id}/delete' , [BrandController::class , 'delete'])->name('brand.delete');
Route::get('/category{id}/delete' , [CategoryController::class , 'delete'])->name('category.delete');


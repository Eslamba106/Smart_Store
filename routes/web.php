<?php

use App\Models\Brand;
use App\Mail\TestMail;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\front\Auth\AuthController;

// Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [AuthController::class ,'loginPage'])->name('login-page');
Route::post('/login', [AuthController::class ,'login'])->name('login');
// Route::post('/register', [AuthController::class , 'register'])->name('register');

//convert language
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
    session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang'); 



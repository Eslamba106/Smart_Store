<?php

use App\Models\Brand;
use App\Mail\TestMail;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\front\Auth\AuthController;

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class ,'loginPage'])->name('login-page');
// Route::post('/register', [AuthController::class , 'register'])->name('register');



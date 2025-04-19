<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SiteController;
// use App\Http\Controllers\CategoryController;

Route::get('/',[SiteController::class,'index'])->name('index');

Route::prefix('user')->name('user.')->group(function(){
    Route::get('/register',[SiteController::class,'showRegisterForm'])->name('registerform');
    Route::post('/register',[SiteController::class,'registration'])->name('registration');
    Route::get('/login',[SiteController::class,'showLoginForm'])->name('loginform');
    Route::post('/login',[SiteController::class,'login'])->name('login');

});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard',[App\Http\Controllers\Backend\DashboardController::class,'index'])->name('dashboard');
    Route::get('/registration',[App\Http\Controllers\Backend\DashboardController::class,'showRegistrationForm'])->name('registrationform');
    Route::post('/registration',[App\Http\Controllers\Backend\DashboardController::class,'registration'])->name('registration');
    Route::resource('categories',[App\Http\Controllers\CategoryController::class]);
    // Route::resource('posts',[App\Http\Controllers\PostController::class]);
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\SiteController;

Route::get('/',[SiteController::class,'index'])->name('index');
Route::get('/post/show/{post}',[SiteController::class,'postShow'])->name('index.post.show');
Route::get('/category/show/{category}',[SiteController::class,'categoryShow'])->name('index.category.show');

Route::prefix('user')->name('user.')->group(function(){
    Route::get('/register',[SiteController::class,'showRegisterForm'])->name('register');
    Route::post('/register',[SiteController::class,'registration'])->name('registration');
    Route::get('/login',[SiteController::class,'showLoginForm'])->name('login');
    Route::post('/login',[SiteController::class,'login'])->name('loginpost');
    Route::get('/logout',[SiteController::class,'logout'])->name('logout');

});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard',[App\Http\Controllers\Backend\DashboardController::class,'index'])->name('dashboard')->middleware('ValidUser');
    Route::get('/registration',[App\Http\Controllers\Backend\DashboardController::class,'showRegistrationForm'])->name('registrationform');
    Route::post('/registration',[App\Http\Controllers\Backend\DashboardController::class,'registration'])->name('registration');
    // Route::resource('categories',App\Http\Controllers\CategoryController::class);
    // Route::resource('post',App\Http\Controllers\PostController::class);
    Route::resources([
        'categories'=>CategoryController::class,
        'post'=>PostController::class
    ]);
});
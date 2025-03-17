<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\CategoryController;

Route::get('/',[SiteController::class,'index'])->name('index');
Route::get('/user/register',[SiteController::class,'showRegisterForm'])->name('user.registerform');
Route::post('/user/register',[SiteController::class,'registration'])->name('user.registration');
Route::get('/user/login',[SiteController::class,'showLoginForm'])->name('user.loginform');
Route::post('/user/login',[SiteController::class,'login'])->name('user.login');

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('categories',CategoryController::class);
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SiteController;

Route::get('/',[SiteController::class,'index'])->name('index');
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/profile', function(){
    return view('profile');
});

route::get('about', function(){
    return view('layouts.about');
});

//Controllers

Route::get('/', [\App\Http\Controllers\WelcomePageController::class, 'welcome']);

Route::get('/blog', [\App\Http\Controllers\BlogPageController::class, 'index']);

Route::get('/blog/post', [\App\Http\Controllers\BlogPageController::class, 'show']);

Route::get('/contactUs', [\App\Http\Controllers\ContactUsController::class, 'index']);

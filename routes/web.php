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

//laravel breeze login

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/profile', function() {
    return view('profile');
});

//login
Route::get('/user/login',[\App\Http\Controllers\LoginController::class,'login']);
Route::post('/user/login',[\App\Http\Controllers\LoginController::class,'loginSubmit']);



//frontend

Route::get('about', function () {
    return view('layouts.about');
})->name('about');

Route::get('/', [\App\Http\Controllers\WelcomePageController::class, 'index'])->name('welcome.index');

Route::get('/', [\App\Http\Controllers\WelcomePageController::class, 'index'])->name('welcome.index');

Route::get('/blog', [\App\Http\Controllers\BlogPageController::class, 'index'])->name('blog.index');

Route::get('/blog/post', [\App\Http\Controllers\BlogPageController::class, 'show'])->name('blog.show');

Route::get('/contactUs', [\App\Http\Controllers\ContactUsController::class, 'index'])->name('contactUs.index');

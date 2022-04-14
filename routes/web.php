<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostCategoryController;
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
Route::get('/admin/login',[AdminController::class,'login']);
Route::post('/admin/login',[AdminController::class,'loginSubmit']);
Route::get('/admin/dashboard',[AdminController::class,'adminDashboard']);
Route::resource('category', PostCategoryController::class);

//frontend

Route::get('about', function () {
    return view('layouts.about');
})->name('about');

Route::get('/', [\App\Http\Controllers\WelcomePageController::class, 'index'])->name('welcome.index');

Route::get('/', [\App\Http\Controllers\WelcomePageController::class, 'index'])->name('welcome.index');

Route::get('/blog', [\App\Http\Controllers\BlogPageController::class, 'index'])->name('blog.index');

Route::get('/blog/post', [\App\Http\Controllers\BlogPageController::class, 'show'])->name('blog.show');

Route::get('/contactUs', [\App\Http\Controllers\ContactUsController::class, 'index'])->name('contactUs.index');

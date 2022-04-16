<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
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

/**
 * Login
 */
Route::get('/admin/login',[AdminController::class,'login']);
Route::post('/admin/login',[AdminController::class,'loginSubmit']);
Route::get('/admin/dashboard',[AdminController::class,'adminDashboard']);

/**
 * Logout
 */
Route::get('/admin/logout',[AdminController::class,'logout']);

/**
 * Categories routes
 */
Route::get('admin/categories/{id}/delete',[PostCategoryController::class, 'destroy']);
Route::resource('admin/categories', PostCategoryController::class);

/**
 * Posts
 */
Route::get('admin/post/{id}/delete',[PostController::class, 'destroy']);
Route::resource('admin/post', PostController::class);

/**
 * Settings
 */
Route::get('admin/settings',[SettingsController::class, 'index']);
Route::post('admin/settings',[SettingsController::class, 'saveSettings']);
//frontend

Route::get('about', function () {
    return view('layouts.about');
})->name('about');

Route::get('/', [\App\Http\Controllers\WelcomePageController::class, 'index']);
Route::get('/detail/{slug}/{id}',[\App\Http\Controllers\WelcomePageController::class,'postDetail']);

//Route::get('/', [\App\Http\Controllers\WelcomePageController::class, 'index'])->name('welcome.index');

//Route::get('/blog', [\App\Http\Controllers\BlogPageController::class, 'index'])->name('blog.index');

//Route::get('/blog/post', [\App\Http\Controllers\BlogPageController::class, 'show'])->name('blog.show');

//Route::get('/contactUs', [\App\Http\Controllers\ContactUsController::class, 'index'])->name('contactUs.index');

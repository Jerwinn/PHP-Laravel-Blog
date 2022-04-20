<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\WelcomePageController;
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

/**
 * Views used to log in and out.
 *
 */

Route::get('/admin/logout',[AdminController::class,'logout']);
Route::get('/',[WelcomePageController::class,'index']);
Route::get('/logout',[WelcomePageController::class,'index']);
Route::get('/admin/login',[AdminController::class,'login']);
Route::post('/admin/login',[AdminController::class,'loginSubmit']);

/**
 * The view for the admins home page.
 */
Route::get('/admin/dashboard',[AdminController::class,'adminDashboard']);

/**
 * Views used by the admin to create and update categories.
 */
Route::get('admin/categories/{id}/delete',[PostCategoryController::class, 'destroy']);
Route::resource('admin/categories', PostCategoryController::class);

/**
 * Views used by the admin to allow them to post and delete posts.
 */
Route::get('admin/post/{id}/delete',[PostController::class, 'destroy']);
Route::resource('admin/post', PostController::class);

/**
 * Views used by admin settings
 */
Route::get('admin/settings',[SettingsController::class, 'index']);
Route::post('admin/settings',[SettingsController::class, 'saveSettings']);

Route::get('about', function () {
    return view('layouts.about');
})->name('about');

/**
 * Views that is used by the welcome/dashboard pages.
 */
Route::get('/detail/{slug}/{id}',[WelcomePageController::class,'detail']);
Route::post('/comment/{slug}/{id}',[WelcomePageController::class,'comment']);
Route::get('/categories',[WelcomePageController::class,'showCategories']);
Route::get('/categories/{slug}/{id}',[WelcomePageController::class,'postCategory']);
Route::get('user-post',[WelcomePageController::class,'saveUserPost']);
Route::post('user-post',[WelcomePageController::class,'saveUserData']);

Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\WelcomePageController::class, 'index']);

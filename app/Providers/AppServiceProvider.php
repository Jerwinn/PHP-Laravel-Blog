<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        View::share('recentPost', Post::orderBy('id','desc')->limit('5')->get());
        View::share('tendingPosts',Post::orderBy('views','desc')->limit('5')->get());
    }
}

<?php

namespace App\Providers;

use App\Models\discussion;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;//to avoid string errors in mysql
use Illuminate\Pagination\Paginator;

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
       
    
    //     view()->composer('layouts.app', function ($view) 
    //    {
    //     $view->with('total_discussions', $total_discussions = discussion::where('user_id', auth()->user()->id)->count());


    //     });
    
       
    }
}

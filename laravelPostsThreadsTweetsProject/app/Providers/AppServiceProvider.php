<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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

        // share the variable with all views
       /* \View::share('users', \App\User::all());
        

        \View::composer('*', function ($view) {
            $view->with('profiles', \App\Profile::all());
        });*/

           }
}

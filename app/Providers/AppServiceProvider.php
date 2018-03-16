<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* 
            This is a view composer.
            Every time this view ie the side bar is called into play,
            something will happen ie the function

            View composers are callbacks or class methods that are called when a view is rendered. 
            If you have data that you want to be bound to a view each time that view is rendered, 
            a view composer can help you organize that logic into a single location
         */
        
        //layouts.sidebar is the name of the view that is loaded
        view() -> composer('layouts.sidebar', function ($view){

            //Add a variable called archives and find the method
            $view -> with('archives', \App\Post::archives());

        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

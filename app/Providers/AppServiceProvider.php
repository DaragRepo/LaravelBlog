<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

         view()->composer('layouts.sidebar', function($view){

            $archives = \App\Post::archives();

            $tags = \App\Tag::has('posts')->pluck('name');

            $view->with(compact('archives', 'tags'));
             // $view->with('archives', \App\Post::archives()); 

             //   // $view->with('tags', \App\Tag::all());
             // $view->with('tags', \App\Tag::has('posts')->pluck('name'));

         });

         Schema::defaultStringLength(191);

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

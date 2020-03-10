<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Categories;
use App\Posts;

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

        view()->composer(['layouts.nav', 'newpost',  'editpost', 'index'], function ($view) {

            $featured = function ($text, $numb) {
                if (strlen($text) > $numb) {
                    $text = substr($text, 0, $numb);
                    $text = substr($text, 0, strrpos($text, ", ")) . "<strong>....</strong>";
                }
                return $text;
            };

            $excerpts = [];
            if (Posts::exists()) {
                $excerpts = Posts::all()->sortByDesc('created_at');
            }

            $view->with('categories', Categories::get()); # pass the categories to any view on which it will be rendered
            $view->with(compact('featured', 'excerpts'));
        });
    }
}

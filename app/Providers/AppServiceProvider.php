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
                // * get the excerpts  and paginate them
                $perpage = 1;
                $page = request('page');
                $offset = $perpage * (int) $page;
                $excerpts = Posts::find(1)->orderBy('created_at', 'desc')->paginate($perpage);
                $posts_id = $excerpts->map(function ($item, $key) {
                    //echo $item['id'];
                    return $item['id'];
                });
                // * get the related post not among the paginated excerpts
                $relatedposts = Posts::whereNotIn('id', $posts_id)
                    ->orderBy('created_at', 'desc')
                    ->limit(1)
                    ->inRandomOrder()
                    ->get();
            }

            $view->with('categories', Categories::get()); # pass the categories to any view on which it will be rendered
            $view->with(compact('featured', 'excerpts', 'relatedposts'));
        });
    }
}

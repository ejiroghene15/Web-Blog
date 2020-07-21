<?php

namespace App\Providers;

date_default_timezone_set('Africa/Lagos');

use App\Categories;
use App\Posts;
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
        // * pass the categories to any view on which it will be rendered
        // view()->share('categories', Categories::get());
        view()->composer(['index'], function ($view) {
            // * function for displaying a portion of the the post.. this is called an excerpt
            $featured = function ($text, $numb) {
                if (strlen($text) > $numb) {
                    $text = substr($text, 0, $numb);
                    $text = substr($text, 0, strrpos($text, " ")) . "<strong>....</strong>";
                }
                return $text;
            };

            $excerpts = $relatedposts = [];
            if (Posts::exists()) {
                // * get the excerpts  and paginate them
                $perpage = 3;
                $page = request('page');
                $offset = $perpage * (int) $page;
                $excerpts = Posts::where('is_approved', 1)->latest()->paginate($perpage);
                $posts_id = $excerpts->map(function ($item, $key) {
                    //echo $item['id'];
                    return $item['id'];
                });
                // * get the related post not among the paginated excerpts
                $relatedposts = Posts::where('is_approved', 1)->whereNotIn('id', $posts_id)
                    ->take(3)
                    ->inRandomOrder()
                    ->get();
            }
            $view->with(compact('featured', 'excerpts', 'relatedposts'));
        });
    }
}

<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Editor;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Automatically provide categories, editors, and authors to create book form.
        View::composer('components.books.form', function($view) {
            $view->with([
                'categories' => Category::all(),
                'authors' => Author::all(),
            ]);
        });

        
        // Automatically provide categories to categories-list component.
        View::composer('components.categories-list', function($view) {
            $view->with([
                'categories' => Category::limit(8)->get(),
            ]);
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\Genre;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Kirim $genres ke semua view yang meng-include navbar
        View::composer(
            ['templates.component.navbar', 'templates.index', 'components.*'],
            function ($view) {
                $view->with('genres', Genre::orderBy('id')->get());
            }
        );
    }
}

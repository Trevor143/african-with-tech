<?php

namespace App\Providers;

use App\Http\Composers\ExtrasComposer;
use App\Http\Composers\FeaturedComposer;
use Backpack\MenuCRUD\app\Models\MenuItem;
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
        View::share('items', MenuItem::all());
        View::composer(['blog.partials.featured'], FeaturedComposer::class);
        View::composer(['blog.partials.extra'], ExtrasComposer::class);

    }
}

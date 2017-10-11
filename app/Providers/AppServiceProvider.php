<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \View;
use \DB;
use App\Categories;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cat = Categories::with('subCategories')->get();
        View::share("cat", $cat);
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

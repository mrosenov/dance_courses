<?php

namespace App\Providers;

use App\Models\SiteSettingsModels;
use App\Http\Controllers\SiteSettingsController;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);

        view()->composer('*',function($view) {
            $settings = (new SiteSettingsController);
            $view->with('settings', $settings->getSiteSettings());
        });
    }
}

<?php

namespace App\Providers;

use App\SystemSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use stdClass;

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
        // Share settings to all views
        $settings = SystemSetting::find(1) ?? new stdClass();
        View::share('settings', $settings);
    }
}

<?php

namespace App\Providers;

use App\Helpers\AppHelper;
use App\Helpers\ViewHelper;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class HelperClassServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('viewhelper', function () {
            return new ViewHelper;
        });

        App::bind('apphelper', function () {
            return new AppHelper;
        });
    }
}

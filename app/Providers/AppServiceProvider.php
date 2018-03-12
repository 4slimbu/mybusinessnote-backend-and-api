<?php

namespace App\Providers;

use App\Http\Resources\Api\BusinessOptionResource;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        BusinessOptionResource::withoutWrapping();
        Validator::extend(
            'recaptcha',
            'App\\Validators\\Recaptcha@validate'
        );
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

<?php

namespace App\Providers;

use App\Http\Resources\Api\BusinessOptionResource;
use App\Utilities\ApiSession;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	    // URL::forceScheme('https');
	    // if(config('app.env') === 'production') {
		    // URL::forceScheme('https');
	    // }

        $apiSession = new ApiSession();
        $this->app->instance('ApiSession', $apiSession);

        Schema::defaultStringLength(191);
//        BusinessOptionResource::withoutWrapping();
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

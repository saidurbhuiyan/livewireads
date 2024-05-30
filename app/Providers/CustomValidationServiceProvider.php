<?php

namespace App\Providers;

use App\Rules\Domain;
use App\Rules\userWebsiteVerify;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class CustomValidationServiceProvider extends ServiceProvider
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
        Validator::extend('domain',Domain::class, (new Domain)->message());

    }
}

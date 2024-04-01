<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


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
    public function boot()
{
    Validator::extend('custom_password', function ($attribute, $value, $parameters, $validator) {
        return preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $value);
    });

    Validator::replacer('custom_password', function ($message, $attribute, $rule, $parameters) {
        return str_replace(':attribute', $attribute, 'The :attribute must be at least 8 characters, contain at least one uppercase letter, one digit, and one special character.');
    });
}
}

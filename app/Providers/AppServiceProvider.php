<?php

namespace App\Providers;

use App\Country;
use App\Gender;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function ($view) {
               $gender = Gender::all();
               $countries = Country::all();
            $view->with(compact('gender','countries'));


        });
    }
}

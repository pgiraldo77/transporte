<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Builder;


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
        Schema::defaultStringLength(191);
        Builder::defaultStringLength(191);
    }
}

<?php

namespace App\Providers;

use App\Classes\Database\MainDatabaseConnector;
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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        MainDatabaseConnector::createMainConnection();
        if ($this->app->environment() == 'local') {
            $this->app->register('Iannazzi\Generators\ImporterServiceProvider');

        }
    }
}

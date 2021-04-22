<?php

namespace Za\Crud\Providers;

use Illuminate\Support\ServiceProvider;

class CustomerServiceProvider extends ServiceProvider

{
    /**
     * 
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'customers');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }

    /**
     * 
     */
    public function register()
    {
    }

}

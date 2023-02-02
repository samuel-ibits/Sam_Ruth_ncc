<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SubmenuRepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'App\Repositories\Submenu\SubmenuInterface',
            'App\Repositories\Submenu\SubmenuRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

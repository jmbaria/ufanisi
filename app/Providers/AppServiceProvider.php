<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\UserPermission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.main', function($view) {
            $role = UserPermission::getUserRole();
            $view->with('data', array('role' => $role));
        });
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

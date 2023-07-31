<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Config;
use App\Models\Contact;

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
    public function boot(): void
    {
        view()->share('config',Config::find(1));
        view()->share('contacts',Contact::all());
    }
}

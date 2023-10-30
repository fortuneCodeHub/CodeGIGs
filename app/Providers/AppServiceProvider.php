<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        // This means you are unsigning the protected fillable property (i.e making sure it's not a must do)
        Model::unguard();

        // This uses bootstrap paginator instead of tailwind paginator
        Paginator::useBootstrapFive();
    }
}

<?php

namespace Vivid\Ignition;

use Facade\Ignition\Ignition;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class TabServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function () {
            $this->routes();
        });

        Ignition::tab(app(Tab::class));
    }

    protected function routes(): void
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        if (!config('app.debug')) {
            return;
        }

        Route::prefix('ignition-vendor/vivid-arch/laravel-ignition-tab')
                ->group(__DIR__ . '/../routes/api.php');
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

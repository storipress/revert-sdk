<?php

declare(strict_types=1);

namespace Storipress\Revert;

use Illuminate\Support\ServiceProvider;

class RevertServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            'revert',
            fn () => $this->app->make(Revert::class),
        );
    }
}

<?php

namespace YourVendor\PrMessageMiddleware;

use Illuminate\Support\ServiceProvider;
use YourVendor\PrMessageMiddleware\Middleware\AddPrMessageHeader;

class PrMessageMiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $router = $this->app->make('router');
        $router->aliasMiddleware('pr-message', AddPrMessageHeader::class);
    }
} 
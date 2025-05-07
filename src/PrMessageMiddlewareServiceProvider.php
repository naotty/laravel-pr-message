<?php

namespace Naotty\LaravelPrMessage;

use Illuminate\Support\ServiceProvider;
use Naotty\LaravelPrMessage\Middleware\AddPrMessageHeader;

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

        $this->publishes([
            $this->configPath() => config_path('pr-message.php'),
        ], 'pr-message-config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            $this->configPath(), 'pr-message'
        );
    }

    /**
     * Get the path of the configuration file
     *
     * @return string
     */
    private function configPath()
    {
        return __DIR__ . '/../config/pr-message.php';
    }
} 
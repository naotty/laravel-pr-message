<?php

namespace Naotty\LaravelPrMessage;

use Illuminate\Support\ServiceProvider;
use Naotty\LaravelPrMessage\Middleware\AddPrMessageHeader;

class PrMessageMiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Path to the configuration file
     *
     * @var string
     */
    private $configPath = __DIR__ . '/../config/pr-message.php';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            $this->configPath => config_path('pr-message.php'),
        ], 'pr-message-config');

        $this->app['router']->aliasMiddleware('pr-message', AddPrMessageHeader::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            $this->configPath, 'pr-message'
        );
        
        $this->app->singleton(AddPrMessageHeader::class);
    }

} 
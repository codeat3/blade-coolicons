<?php

declare(strict_types=1);

namespace Codeat3\BladeCoolicons;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;

final class BladeCooliconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-coolicons', []);

            $factory->add('coolicons', array_merge(['path' => __DIR__.'/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-coolicons.php', 'blade-coolicons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-coolicons'),
            ], 'blade-coolicons');

            $this->publishes([
                __DIR__.'/../config/blade-coolicons.php' => $this->app->configPath('blade-coolicons.php'),
            ], 'blade-coolicons-config');
        }
    }
}

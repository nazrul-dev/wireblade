<?php

namespace WireBlade\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\{ServiceProvider, Stringable};
use Illuminate\View\Compilers\BladeCompiler;
use WireBlade\Facades\{WireBladeComponent, WireBladeDirectives};
use WireBlade\Mixins\Stringable\UnlessMixin;
use WireBlade\Support\WireBladeTagCompiler;

class WireBladeServiceProvider extends ServiceProvider
{
    public const PACKAGE_NAME = 'wireblade';

    public function boot()
    {
        $this->registerViews();
        $this->registerBladeDirectives();
        $this->registerBladeComponents();
        $this->registerTagCompiler();
        $this->registerMixins();
    }

    public function register()
    {
        $this->app->singleton('WireBladeComponent', WireBladeComponent::class);
        $loader = AliasLoader::getInstance();
        $loader->alias('WireBladeComponent', WireBladeComponent::class);
    }

    protected function registerTagCompiler()
    {
        if (method_exists($this->app['blade.compiler'], 'precompiler')) {
            $this->app['blade.compiler']->precompiler(function ($string) {
                return app(WireBladeTagCompiler::class)->compile($string);
            });
        }
    }

    protected function registerViews(): void
    {
        $rootDir = __DIR__ . '/../..';

        $this->loadViewsFrom("{$rootDir}/resources/views", self::PACKAGE_NAME);
        $this->loadTranslationsFrom("{$rootDir}/resources/lang", self::PACKAGE_NAME);
        $this->mergeConfigFrom("{$rootDir}/config/wireblade.php", self::PACKAGE_NAME);
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->publishes([
            "{$rootDir}/config/wireblade.php" => config_path('wireblade.php'),
        ], self::PACKAGE_NAME . '.config');

        $this->publishes([
            "{$rootDir}/resources/views" => resource_path('views/vendor/' . self::PACKAGE_NAME),
        ], self::PACKAGE_NAME . '.resources');

        $this->publishes([
            "{$rootDir}/resources/lang" => resource_path('lang/vendor/' . self::PACKAGE_NAME),
        ], self::PACKAGE_NAME . '.lang');
    }

    protected function registerBladeDirectives(): void
    {
        Blade::directive('confirmAction', fn (string $expression) => WireBladeDirectives::confirmAction($expression));
        Blade::directive('notify', fn (string $expression) => WireBladeDirectives::notify($expression));
        Blade::directive('wireUiScripts', fn () => WireBladeDirectives::scripts());
        Blade::directive('wireUiStyles', fn () => WireBladeDirectives::styles());
        Blade::directive('boolean', fn ($value) => WireBladeDirectives::boolean($value));
    }

    protected function registerBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            foreach (config('wireblade.components') as $component) {
                $blade->component($component['class'], $component['alias']);
            }
        });
    }

    protected function registerMixins()
    {
        if (!Stringable::hasMacro('unless')) {
            Stringable::macro('unless', app(UnlessMixin::class)());
        }
    }
}

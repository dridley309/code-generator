<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator;

use Dridley309\CodeGenerator\Strategies\StrategyInterface;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

final class CodeGeneratorServiceProvider extends ServiceProvider
{ 
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'code_generator');
        $this->app->bind(
            StrategyInterface::class,
            Config::get('code_generator.default_strategy'),
        );
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator;

use Dridley309\CodeGenerator\Rules\RuleInterface;
use Dridley309\CodeGenerator\Strategies\StrategyInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

final class CodeGeneratorServiceProvider extends ServiceProvider
{ 
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'code_generator');

        $defaultStrategyClass = Config::get('code_generator.default_strategy');

        $this->app->bind(
            StrategyInterface::class,
            $defaultStrategyClass,
        );

        $defaultStrategyRules = Config::get('code_generator.strategy_definitions')[$defaultStrategyClass] ?? [];

        $this->app->when($defaultStrategyClass)
                ->needs(RuleInterface::class)
                ->give($defaultStrategyRules);
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
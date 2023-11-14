<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator;

use Illuminate\Support\ServiceProvider;

final class CodeGeneratorServiceProvider extends ServiceProvider
{ 
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'code_generator');
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
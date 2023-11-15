<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator\Strategies;

interface StrategyInterface
{
    public function process(): string;
}

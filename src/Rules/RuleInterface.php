<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator\Rules;

interface RuleInterface
{ 
    public static function apply(string $value): void;
}

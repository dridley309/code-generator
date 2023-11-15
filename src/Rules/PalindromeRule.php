<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator\Rules;

use Dridley309\CodeGenerator\Exceptions\RuleFailedException;

final class PalindromeRule implements RuleInterface
{ 
    public static function apply(string $value): void
    {
        if ($value === strrev($value)) {
            throw new RuleFailedException();
        }
    }
}

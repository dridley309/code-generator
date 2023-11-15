<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator\Rules;

use Dridley309\CodeGenerator\Exceptions\RuleFailedException;

final class RepeatedCharacterRule implements RuleInterface
{ 
    private const MAX_REPEATED_CHARS = 3;

    /**
     * @throws RuleFailedException
     */
    public static function apply(string $value): void
    {
        foreach (count_chars($value, 1) as $count) {
            if ($count > self::MAX_REPEATED_CHARS) {
                throw new RuleFailedException();
            }
         }
    }
}

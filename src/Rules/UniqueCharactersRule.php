<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator\Rules;

use Dridley309\CodeGenerator\Exceptions\RuleFailedException;

final class UniqueCharactersRule implements RuleInterface
{
    private const MIN_UNIQUE_CHARS = 3;
 
    /**
     * @throws RuleFailedException
     */
    public static function apply(string $value): void
    {
        if (strlen(count_chars($value, 3)) < self::MIN_UNIQUE_CHARS) {
            throw new RuleFailedException();
        }
    }
}

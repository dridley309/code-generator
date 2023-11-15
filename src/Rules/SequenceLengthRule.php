<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator\Rules;

use Dridley309\CodeGenerator\Exceptions\RuleFailedException;

final class SequenceLengthRule implements RuleInterface
{
    private const MAX_SEQUENCE_LENGTH = 3;

    /**
     * @throws RuleFailedException
     */
    public static function apply(string $value): void
    {
        $length = strlen($value);
        $ascSequenceCount = 1;
        $descSequenceCount = 1;
        
        for($i = 1; $i < $length; $i++) {
            ++$ascSequenceCount;
            ++$descSequenceCount;
        
            $currentValue = $value[$i];
            $previousValue = $value[$i - 1];
            
            if (chr(ord($previousValue) + 1) !== $currentValue) {
                $ascSequenceCount = 1;
            }
        
            
            if (chr(ord($previousValue) - 1) !== $currentValue) {
                $descSequenceCount = 1;
            }
            
            if ($ascSequenceCount > self::MAX_SEQUENCE_LENGTH
                || $descSequenceCount > self::MAX_SEQUENCE_LENGTH
            ) {
                throw new RuleFailedException();
            }
        }
    }
}

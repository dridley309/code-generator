<?php

declare(strict_types=1);

use Dridley309\CodeGenerator\Rules\PalindromeRule;
use Dridley309\CodeGenerator\Rules\RepeatedCharacterRule;
use Dridley309\CodeGenerator\Rules\SequenceLengthRule;
use Dridley309\CodeGenerator\Rules\UniqueCharactersRule;
use Dridley309\CodeGenerator\Strategies\NumericSixStrategy;

return [
    'codes_table' => 'codes',
    'default_strategy' => NumericSixStrategy::class,
    'strategy_definitions' => [
        NumericSixStrategy::class => [
            PalindromeRule::class,
            RepeatedCharacterRule::class,
            SequenceLengthRule::class,
            UniqueCharactersRule::class,
        ],
    ],
    'max_retries' => 10,
];
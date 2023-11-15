<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator\Strategies;

use Dridley309\CodeGenerator\Exceptions\RuleFailedException;
use Illuminate\Support\Collection;

abstract class AbstractStrategy implements StrategyInterface
{ 
    protected Collection $rules;

    public function process(): string
    {
        $value = $this->generateInitialValue();

        try {
            $this->validateRules($value);
        } catch (RuleFailedException $e) {
            return $this->process();
        }

        return $value;
    }

    protected function validateRules(string $value): void
    {
    }

    abstract protected function generateInitialValue(): string;
}

<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator\Strategies;

use Dridley309\CodeGenerator\Exceptions\RuleFailedException;
use Dridley309\CodeGenerator\Rules\RuleInterface;
use Illuminate\Support\Facades\Config;

abstract class AbstractStrategy implements StrategyInterface
{ 
    /**
     * @var RuleInterface
     */
    private array $rules = [];

    private int $retries = 0;

    public function __construct(RuleInterface ...$rules)
    {
        $this->rules = $rules;
    }

    public function process(): string
    {

        $value = $this->generateInitialValue();

        try {
            $this->validateRules($value);
        } catch (RuleFailedException $e) {
            $this->retries++;

            if ($this->retries > Config::get('code_generator.max_retries')) {
                $this->retries = 0;

                throw new \RuntimeException('Unable to generate code: max retries exceeded');
            }

            return $this->process();
        }

        return $value;
    }

    protected function validateRules(string $value): void
    {
        foreach($this->rules as $rule) {
            $rule::apply($value);
        }
    }

    abstract protected function generateInitialValue(): string;
}

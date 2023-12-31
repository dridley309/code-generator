<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator\Strategies;

class NumericSixStrategy extends AbstractStrategy
{ 
    protected function generateInitialValue(): string
    {
        return sprintf('%06d', mt_rand(1, 999999));
    }
}

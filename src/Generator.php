<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator;

use Dridley309\CodeGenerator\Strategies\StrategyInterface;

class Generator
{ 
    public StrategyInterface $strategy;
    
    public function __construct(StrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }        

    public function generate(): string
    {
        return $this->strategy->process();
    }
}

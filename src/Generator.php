<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator;

use Dridley309\CodeGenerator\Repositories\CodeRepository;
use Dridley309\CodeGenerator\Strategies\StrategyInterface;

class Generator
{ 
    public StrategyInterface $strategy;
    public CodeRepository $codeRepository;
    
    public function __construct(StrategyInterface $strategy, CodeRepository $codeRepository)
    {
        $this->strategy = $strategy;
        $this->codeRepository = $codeRepository;
    }        

    /**
     * @throws UniqueConstraintViolationException
     */
    public function generate(): string
    {
        $codeValue = $this->strategy->process();
        $code = $this->codeRepository->createCode($codeValue);

        return $code->getValue();
    }
}

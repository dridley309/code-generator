<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator;

class Generator
{ 
    public function generate(): string
    {
        return sprintf('%06d', mt_rand(1, 999999));
    }
}

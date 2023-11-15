<?php

namespace Dridley309\CodeGenerator\Tests\Unit;

use Dridley309\CodeGenerator\Generator;
use Dridley309\CodeGenerator\Strategies\AbstractStrategy;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    private const CODE_LENGTH = 6;

    public function test_that_code_is_numeric(): void
    {

        $generator = new Generator($this->createMockStrategy());
        $this->assertIsNumeric($generator->generate());
    }

    public function test_that_code_is_correct_length(): void
    {
        $generator = new Generator($this->createMockStrategy());
        $this->assertEquals(self::CODE_LENGTH, strlen($generator->generate()));
    }

    /**
     * @return AbstractStrategy|MockObject
     */
    private function createMockStrategy(): MockObject
    {
       $mock = $this->createMock(AbstractStrategy::class);
       $mock->method('process')->willReturn('159753');
            
       return $mock;
    }
}

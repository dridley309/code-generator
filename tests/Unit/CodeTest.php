<?php

namespace Dridley309\CodeGenerator\Tests\Unit;

use Dridley309\CodeGenerator\Models\Code;
use Illuminate\Foundation\Testing\RefreshDatabase;
Use Dridley309\CodeGenerator\Tests\TestCase;

class CodeTest extends TestCase
{
    use RefreshDatabase;

    public function test_code_has_a_value()
    {
        $code = Code::factory()->create();
        $this->assertNotEmpty($code->value);
    }
}

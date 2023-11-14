<?php

namespace Dridley309\CodeGenerator\Tests;

use Dridley309\CodeGenerator\CodeGeneratorServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [CodeGeneratorServiceProvider::class];
    }
}

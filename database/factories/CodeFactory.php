<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator\Database\Factories;

use Dridley309\CodeGenerator\Models\Code;
use Illuminate\Database\Eloquent\Factories\Factory;

class CodeFactory extends Factory
{
    protected $model = Code::class;

    public function definition()
    {
        return [
            'value' => (string) $this->faker->randomNumber(6),
        ];
    }

}
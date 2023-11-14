<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Code extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return \Dridley309\CodeGenerator\Database\Factories\CodeFactory::new();
    }
}
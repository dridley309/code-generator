<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = ['value'];

    public function getValue(): string
    {
        return $this->value;
    }

    protected static function newFactory()
    {
        return \Dridley309\CodeGenerator\Database\Factories\CodeFactory::new();
    }
}
<?php

declare(strict_types=1);

namespace Dridley309\CodeGenerator\Repositories;

use Dridley309\CodeGenerator\Exceptions\CodeNotFoundException;
use Dridley309\CodeGenerator\Models\Code;

class CodeRepository
{
    /**
     * @throws UniqueConstraintViolationException
     */
    public function createCode(string $value): Code
    {
        return Code::create(['value' => $value]);
    }

    /**
     * @throws CodeNotFoundException
     */
    public function allocateCode()
    {
        $unallocatedCodes = Code::where('allocated', false)->get();

        if ($unallocatedCodes->isEmpty()) {
            throw new CodeNotFoundException('No unnallocated codes found');
        }

        $code = $unallocatedCodes->random();

        $code->allocated = true;
        $code->save();

        return $code;
    }

    /**
     * @throws CodeNotFoundException
     */
    public function resetCodeAllocation(string $value): void
    {
        $code = Code::where('value', $value)->get()->first();

        if (!$code instanceof Code) {
            throw new CodeNotFoundException(
                sprintf('Code with value %s not found', $value),
            );
        }

        $code->allocated = false;
    }

    public function getUnallocatedCount(): int
    {
        return Code::where('allocated', false)->get()->count();
    }
}
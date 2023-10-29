<?php

namespace Kero\TypeSafeEnv\Exceptions;

use RuntimeException;
use Throwable;

class InvalidTypeException extends RuntimeException
{
    public function __construct(
        string $expectedType,
        string $actualType,
        int $code = 0,
        Throwable|null $previous = null
    ) {
        parent::__construct(
            sprintf('Expected `%s` but received `%s`.', $expectedType, $actualType),
            $code,
            $previous,
        );
    }
}

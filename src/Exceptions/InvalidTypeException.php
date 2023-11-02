<?php

namespace Kero\TypeSafeEnv\Exceptions;

use RuntimeException;
use Throwable;

class InvalidTypeException extends RuntimeException
{
    public function __construct(
        string $key,
        string $expectedType,
        mixed $val,
        int $code = 0,
        Throwable|null $previous = null
    ) {
        return parent::__construct(
            sprintf(
                'env(%s) expected `%s`, got %s',
                $key,
                $expectedType,
                var_export($val, true),
            ),
            $code,
            $previous,
        );
    }
}

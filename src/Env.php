<?php

namespace Kero\TypeSafeEnv;

use Illuminate\Support\Env as SupportEnv;
use Kero\TypeSafeEnv\Exceptions\InvalidTypeException;

class Env
{
    /**
     * Get **string** value of an environment variable.
     *
     * @throws InvalidTypeException
     */
    public static function getString(string $key, string $default = ''): string
    {
        $value = SupportEnv::get($key, $default);
        if (!is_string($value)) {
            throw new InvalidTypeException('string', gettype($value));
        }

        return $value;
    }

    /**
     * Get **bool** value of an environment variable.
     *
     * @throws InvalidTypeException
     */
    public static function getBool(string $key, bool $default = false): bool
    {
        $value = SupportEnv::get($key, $default);
        if (!is_bool($value)) {
            throw new InvalidTypeException('boolean', gettype($value));
        }

        return $value;
    }
}

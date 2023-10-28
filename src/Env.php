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
        is_string($val = SupportEnv::get($key, $default))
            || throw new InvalidTypeException('string', gettype($val));
        return $val;
    }
    
    /**
     * Get **bool** value of an environment variable.
     *
     * @throws InvalidTypeException
     */
    public static function getBool(string $key, string $default = ''): bool
    {
        is_bool($val = SupportEnv::get($key, $default))
            || throw new InvalidTypeException('bool', gettype($val));
        return $val;
    }
}

<?php

namespace Kero\TypeSafeEnv;

use Illuminate\Support\Env as SupportEnv;
use Kero\TypeSafeEnv\Exceptions\InvalidTypeException;

class Env
{
    /**
     * Get `string` value of an environment variable.
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
     * Get `string` or `null` value of an environment variable.
     *
     * @throws InvalidTypeException
     */
    public static function getNullableString(string $key, string|null $default = null): string|null
    {
        $value = SupportEnv::get($key, $default);
        if (!is_string($value) && !is_null($value)) {
            throw new InvalidTypeException('string|null', gettype($value));
        }

        return $value;
    }

    /**
     * Get `bool` value of an environment variable.
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

    /**
     * Get `bool` or `null` value of an environment variable.
     *
     * @throws InvalidTypeException
     */
    public static function getNullableBool(string $key, bool|null $default = null): bool|null
    {
        $value = SupportEnv::get($key, $default);
        if (!is_bool($value) && !is_null($value)) {
            throw new InvalidTypeException('boolean|null', gettype($value));
        }

        return $value;
    }

    /**
     * Get `int` value of an environment variable.
     *
     * @throws InvalidTypeException
     */
    public static function getInt(string $key, int $default = 0): int
    {
        $value = filter_var(SupportEnv::get($key, $default), \FILTER_VALIDATE_INT);
        if (!is_int($value)) {
            throw new InvalidTypeException('int', 'unkown'); // TODO: fix exception
        }
        return $value;
    }
}

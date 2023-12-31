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
            throw new InvalidTypeException($key, 'string', $value);
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
            throw new InvalidTypeException($key, 'string|null', $value);
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
            throw new InvalidTypeException($key, 'boolean', $value);
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
            throw new InvalidTypeException($key, 'boolean|null', $value);
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
        if ($value === false) {
            throw new InvalidTypeException($key, 'int', $value);
        }
        return $value;
    }

    /**
     * Get `int` or `null` value of an environment variable.
     *
     * @throws InvalidTypeException
     */
    public static function getNullableInt(string $key, int|null $default = null): int|null
    {
        $value = SupportEnv::get($key, $default);
        if ($value === null) {
            return $value;
        }
        $filteredInt = filter_var($value, FILTER_VALIDATE_INT);
        if ($filteredInt === false) {
            throw new InvalidTypeException($key, 'int|null', $value);
        }
        return $filteredInt;
    }

    /**
     * Get `float` value of an environment variable.
     *
     * @throws InvalidTypeException
     */
    public static function getFloat(string $key, float $default = 0.0): float
    {
        $value = filter_var(SupportEnv::get($key, $default), \FILTER_VALIDATE_FLOAT);
        if ($value === false) {
            throw new InvalidTypeException($key, 'float', $value);
        }
        return $value;
    }

    /**
     * Get `float` or `null` value of an environment variable.
     *
     * @throws InvalidTypeException
     */
    public static function getNullableFloat(string $key, int|null $default = null): float|null
    {
        $value = SupportEnv::get($key, $default);
        if ($value === null) {
            return $value;
        }
        $filteredFloat = filter_var($value, \FILTER_VALIDATE_FLOAT);
        if ($filteredFloat === false) {
            throw new InvalidTypeException($key, 'float|null', $value);
        }
        return $filteredFloat;
    }
}

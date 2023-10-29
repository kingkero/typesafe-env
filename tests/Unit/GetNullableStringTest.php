<?php

use Kero\TypeSafeEnv\Env;
use Kero\TypeSafeEnv\Exceptions\InvalidTypeException;

beforeAll(function () {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../', '.env.testing');
    $dotenv->load();
});

it('should return null for a variable with content "null" and using string getter', function () {
    expect(Env::getNullableString('TEST_NULL'))->toBeNull();
});

it('should return null for a variable with content "(null)" and using string getter', function () {
    expect(Env::getNullableString('TEST_NULL_BRACKETED'))->toBeNull();
});

it('should default to null for an undefined variable', function () {
    expect(Env::getNullableString('UNDEFINED'))->toBeNull();
});

it('should throw an InvalidTypeException for a bool variable', function () {
    Env::getNullableString('TEST_BOOL_TRUE');
})->throws(InvalidTypeException::class, 'Expected `string|null` but received `boolean`.');

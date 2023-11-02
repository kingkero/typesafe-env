<?php

use Kero\TypeSafeEnv\Env;
use Kero\TypeSafeEnv\Exceptions\InvalidTypeException;

beforeAll(function () {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../', '.env.testing');
    $dotenv->load();
});

it('should return null for a variable with content "null" and using string getter', function () {
    expect(Env::getNullableString('TEST_NULL'))->toBeNull();
    expect(Env::getNullableBool('TEST_NULL'))->toBeNull();
    expect(Env::getNullableInt('TEST_NULL'))->toBeNull();
});

it('should return null for a variable with content "(null)" and using string getter', function () {
    expect(Env::getNullableString('TEST_NULL_BRACKETED'))->toBeNull();
    expect(Env::getNullableBool('TEST_NULL_BRACKETED'))->toBeNull();
    expect(Env::getNullableInt('TEST_NULL_BRACKETED'))->toBeNull();
});

it('should default to null for an undefined variable', function () {
    expect(Env::getNullableString('UNDEFINED'))->toBeNull();
    expect(Env::getNullableBool('UNDEFINED'))->toBeNull();
    expect(Env::getNullableInt('UNDEFINED'))->toBeNull();
});

it('should throw an InvalidTypeException for a bool variable when using getNullableString', function () {
    Env::getNullableString('TEST_BOOL_TRUE');
})->throws(InvalidTypeException::class, 'Expected `string|null` but received `boolean`.');

it('should throw an InvalidTypeException for a string variable when using getNullableBool', function () {
    Env::getNullableBool('TEST_STRING');
})->throws(InvalidTypeException::class, 'Expected `boolean|null` but received `string`.');

it('should throw an InvalidTypeException for a string variable when using getNullableInt', function () {
    Env::getNullableInt('TEST_STRING');
})->throws(InvalidTypeException::class, 'Expected `int|null` but received `unknown`.');

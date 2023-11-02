<?php

use Kero\TypeSafeEnv\Env;
use Kero\TypeSafeEnv\Exceptions\InvalidTypeException;

beforeAll(function () {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../', '.env.testing');
    $dotenv->load();
});

it('should return null for value "null"', function (callable $method) {
    expect($method('TEST_NULL'))->toBeNull();
})->with('nullableMethods');

it('should return null for value "(null)"', function (callable $method) {
    expect($method('TEST_NULL_BRACKETED'))->toBeNull();
})->with('nullableMethods');

it('should default to null for an undefined variable', function (callable $method) {
    expect($method('UNDEFINED'))->toBeNull();
})->with('nullableMethods');

it('should throw an InvalidTypeException for a bool variable when using getNullableString', function () {
    Env::getNullableString('TEST_BOOL_TRUE');
})->throws(InvalidTypeException::class, 'Expected `string|null` but received `boolean`.');

it('should throw an InvalidTypeException for a string variable when using getNullableBool', function () {
    Env::getNullableBool('TEST_STRING');
})->throws(InvalidTypeException::class, 'Expected `boolean|null` but received `string`.');

it('should throw an InvalidTypeException for a string variable when using getNullableInt', function () {
    Env::getNullableInt('TEST_STRING');
})->throws(InvalidTypeException::class, 'Expected `int|null` but received `unknown`.');

it('should throw an InvalidTypeException for a string variable when using getNullableFloat', function () {
    Env::getNullableFloat('TEST_STRING');
})->throws(InvalidTypeException::class, 'Expected `float|null` but received `unknown`.');

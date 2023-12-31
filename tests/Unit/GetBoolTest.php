<?php

use Kero\TypeSafeEnv\Env;
use Kero\TypeSafeEnv\Exceptions\InvalidTypeException;

beforeAll(function () {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../', '.env.testing');
    $dotenv->load();
});

it('should return true for an env with value "true"', function () {
    expect(Env::getBool('TEST_BOOL_TRUE'))->toBeTrue();
});

it('should return true for an env with value "TRUE" (uppercase)', function () {
    expect(Env::getBool('TEST_BOOL_TRUE_UPPERCASE'))->toBeTrue();
});

it('should throw an exception for trying to get a bool that is a string', function () {
    Env::getBool('TEST_STRING');
})->throws(InvalidTypeException::class, 'env(TEST_STRING) expected `boolean`, got \'Hello World!\'');

it('should return false for an env with value "false"', function () {
    expect(Env::getBool('TEST_BOOL_FALSE'))->toBeFalse();
});

it('should return false for an env with value "FALSE" (uppercase)', function () {
    expect(Env::getBool('TEST_BOOL_FALSE_UPPERCASE'))->toBeFalse();
});

it('should default to false for an undefined variable', function () {
    expect(Env::getBool('UNDEFINED'))->toBeFalse();
});

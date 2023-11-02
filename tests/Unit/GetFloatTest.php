<?php

use Kero\TypeSafeEnv\Env;
use Kero\TypeSafeEnv\Exceptions\InvalidTypeException;

beforeAll(function () {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../', '.env.testing');
    $dotenv->load();
});

it('should return 3.14 for the defined float', function () {
    expect(Env::getFloat('TEST_FLOAT'))
        ->toBeFloat()
        ->toBe(3.14);
});

it('should return 0.0 as default for an undefined variable', function () {
    expect(Env::getFloat('UNDEFINED'))
        ->toBeFloat()
        ->toBe(0.0);
});

it('should throw an InvalidTypeException for a string value', function () {
    Env::getFloat('TEST_STRING');
})->throws(InvalidTypeException::class, 'env(TEST_STRING) expected `float`');

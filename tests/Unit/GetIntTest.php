<?php

use Kero\TypeSafeEnv\Env;
use Kero\TypeSafeEnv\Exceptions\InvalidTypeException;

beforeAll(function () {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../', '.env.testing');
    $dotenv->load();
});

it('should return 5 for the defined int', function () {
    expect(Env::getInt('TEST_INT'))
        ->toBeInt()
        ->toBe(5);
});

it('should return 0 as default for an undefined variable', function () {
    expect(Env::getInt('UNDEFINED'))
        ->toBeInt()
        ->toBe(0);
});

it('should throw an InvalidTypeException for a string value', function () {
    Env::getInt('TEST_STRING');
})->throws(InvalidTypeException::class, 'Expected `int` but received `unknown`.');

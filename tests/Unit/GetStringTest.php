<?php

use Kero\TypeSafeEnv\Env;
use Kero\TypeSafeEnv\Exceptions\InvalidTypeException;

beforeAll(function () {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../', '.env.testing');
    $dotenv->load();
});

it('should return "Hello World!" for the defined string', function () {
    expect(Env::getString('TEST_STRING'))
        ->toBeString()
        ->toBe('Hello World!')
    ;
});

it('should default to empty string for an undefined variable', function () {
    expect(Env::getString('UNDEFINED'))
        ->toBeString()
        ->toBe('')
    ;
});

it('should throw an InvalidTypeException for a bool variable', function () {
    Env::getString('TEST_BOOL_TRUE');
})->throws(InvalidTypeException::class, 'env(TEST_BOOL_TRUE) expected `string`, got true');

<?php

use Kero\TypeSafeEnv\Env;

it('should return "Hello World!" for the defined string', function () {
    expect(Env::getString('TEST_STRING'))
        ->toBeString()
        ->toBe('Hello World!')
    ;
});

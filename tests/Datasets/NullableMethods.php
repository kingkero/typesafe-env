<?php

use Kero\TypeSafeEnv\Env;

dataset('nullableMethods', [
    [[Env::class, 'getNullableString']],
    [[Env::class, 'getNullableBool']],
    [[Env::class, 'getNullableInt']],
    [[Env::class, 'getNullableFloat']],
]);

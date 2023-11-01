# Type Safe Env

Install via `composer req kero/typesafe-env`

![GitHub latest tag](https://img.shields.io/github/v/tag/kingkero/typesafe-env) [![codecov](https://codecov.io/gh/kingkero/typesafe-env/graph/badge.svg?token=4EAAZYEAN3)](https://codecov.io/gh/kingkero/typesafe-env) ![license: MIT](https://img.shields.io/github/license/kingkero/typesafe-env)



## Usage

Assuming the following environment variables

```shell
API_URL=foo
APP_STRING_OR_NULL=null

APP_DEBUG=true
APP_LOG=false
APP_BOOL_OR_NULL=null
```

```php
use Kero\TypeSafeEnv\Env;

var_dump(Env::getString('API_URL')); // string(3) "foo"
var_dump(Env::getNullableString('APP_STRING_OR_NULL')); // NULL

var_dump(Env::getBool('APP_DEBUG')); // bool(true)
var_dump(Env::getBool('APP_LOG')); // bool(false)
var_dump(Env::getNullableBool('APP_BOOL_OR_NULL')); // NULL
```

❗ Due to Laravel's implementation, both values `null` and `(null)` are treated as `NULL`.

## Local Development

### Code Style

Currently using plain **PSR-12** via [Laravel Pint](https://laravel.com/docs/10.x/pint). Apply the code style via

```bash
make pint
```

### Tests

Using [Pest](https://pestphp.com/) for testing. Run existing tests via


```bash
make test
```

❗ Tests are relying on the environment variables defined in _.env.testing_

[Type Coverage](https://pestphp.com/docs/type-coverage) can also be tested via Pest. Current implementation inside _Makefile_ is buggy ... (TODO: fix so command in Makefile via Docker can be used)

```bash
./vendor/bin/pest --type-coverage --min=100
```

### Code Analysis

[PHPStan](https://phpstan.org/) is configured to check `./src/` and `./tests/` via

```bash
make analyse
```

### Various

- normalize _composer.json_ file via [`ergebnis/composer-normalize`](https://github.com/ergebnis/composer-normalize)

```bash
composer normalize
```

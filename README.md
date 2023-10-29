# Type Safe Env

Install via `composer req kero/typesafe-env`

## Usage

Assuming the following environment variables

```shell
API_URL=foo
APP_DEBUG=true
APP_LOG=false
```

```php
use Kero\TypeSafeEnv\Env;

var_dump(Env::getString('API_URL')); // string(3) "foo"
var_dump(Env::getBool('APP_DEBUG')); // bool(true)
var_dump(Env::getBool('APP_LOG'));   // bool(false)
```

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

### Code Analysis

[PHPStan](https://phpstan.org/) is configured to check `./src/` and `./tests/` via

```bash
make analyse
```
